<?php

namespace App\Http\Controllers;

use App\Clients\Asaas\Method\Responses\PixResponse;
use App\Dtos\Asaas\PaymentRequest;
use App\Repositories\Interfaces\PaymentRepositoryInterface;
use App\Services\ProductService;
use App\Supports\Result;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService             $service,
        private readonly PaymentRepositoryInterface $repository,
    )
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('products', ['products' => $this->service->getAllProducts()->toArray($request)]);
    }

    public function pay(Request $request): RedirectResponse
    {
        $product = $this->service->find($request->product);
        $client = $request->session()->get('result_new_client')->getContent();
        $customer = $client->id;
        $paymentRequest = PaymentRequest::fromArray(['dueDate' => now()->format('Y-m-d'), 'customer' => $customer, 'value' => $product->price, 'billingType' => $request->billingType]);
        $result = $this->repository->requestPayment($paymentRequest);
        $paymentRequest = PaymentRequest::fromArray([...$paymentRequest->toArray(), 'id' => $result->getContent()->id]);
        $result = $this->repository->pay($paymentRequest);
        return $this->handleResult($result);
    }

    private function handleResult(Result $result): RedirectResponse
    {
        if ($result->isSuccess() && $result->getContent() instanceof PixResponse) {
            return redirect()->route('pix')->with('result_payment', $result->getContent()->getResult());
        }
    }
}
