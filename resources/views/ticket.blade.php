@extends('app')
@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">link do
                boleto</h2>
        </div>
        <a href="{{session('result_payment')}}" target="_blank">> baixar boleto</a>

    </div>
@endsection
