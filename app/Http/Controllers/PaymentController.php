<?php

namespace App\Http\Controllers;

class PaymentController extends Controller
{
    public function pix()
    {
        return view('pix');
    }

    public function ticket()
    {
        return view('ticket');
    }

    public function creditCard()
    {
        return view('credit-card-result');
    }
}
