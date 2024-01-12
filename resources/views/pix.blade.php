@extends('app')
@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">QRCode PIX</h2>
        </div>
        {{session('payment_result')}}
        {{session('payment_result_error')}}
        <img width="200" src="data:image/jpeg;base64,{{session('result_payment')}}"/>

    </div>
@endsection
