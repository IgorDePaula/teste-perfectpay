<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewClientAsaasRequest;
use App\Services\AsaasService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function __construct(private readonly AsaasService $service)
    {

    }

    public function newClientForm(Request $request): View
    {
        return view('newclient');
    }

    public function newClientRequest(NewClientAsaasRequest $request): RedirectResponse
    {
        $result = $this->service->newClient($request->toDto());
        $request->session()->put('result_new_client', $result);
        $redirect = redirect()->route('products');
        $result->isSuccess() ?
            $redirect->with('result', 'success')
                ->with('content', null) :
            $redirect->with('result', 'error')
                ->with('content', $result->getContent()->getMessage());

        return $redirect;
    }
}
