<?php

namespace App\Http\Controllers;

use App\Services\AsaasService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct(private readonly AsaasService $service){

    }
    public function newClientForm(Request $request)
    {
        return view('newclient');
    }

    public function newClientRequest(Request $request)
    {

    }
}
