<?php

namespace App\Http\Controllers;

use App\Clients\Asaas\Method\Responses\PixResponse;
use App\Enums\PaymentMethodEnum;
use App\Services\PaymentService;
use App\Services\ProductService;
use App\Supports\Result;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $productService,
        private readonly PaymentService $paymentService,
    ) {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('products', ['products' => $this->productService->getAllProducts()->toArray($request)]);
    }

    public function pay(Request $request): RedirectResponse
    {
        $product = $this->productService->find($request->product);
        $client = $request->session()->get('result_new_client')->getContent();
        $result = $this->paymentService->pay($client, $product, PaymentMethodEnum::tryFrom($request->billingType));

        return $this->handleResult($result);
    }

    private function handleResult(Result $result): RedirectResponse
    {
        if ($result->isSuccess() && $result->getContent() instanceof PixResponse) {
            return redirect()->route('pix')->with('result_payment', $result->getContent()->getResult());
        }

        return redirect()->route('pix')->with('result_payment', 'Erro no processamento do pagamento');
    }
}
