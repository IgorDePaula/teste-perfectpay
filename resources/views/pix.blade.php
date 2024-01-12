@extends('app')
@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">QRCode PIX</h2>
        </div>
        <img width="200" src="data:image/jpeg;base64,{{session('image')}}"/><br>
        <p>Codigo copia e cola</p>
        <p>{{session('copy')}}</p>

    </div>
@endsection
