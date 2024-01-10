<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private readonly ProductService $service)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('products', ['products' => $this->service->getAllProducts()->toArray($request)]);
    }
}
