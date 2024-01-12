@extends('app')
@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">

            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Dados do cartao</h2>
        </div>


        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6"
                  action="{{route('credi-card-process')}}?product={{$product}}&billingType=CREDIT_CARD" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Nome impresso no
                        cartao <span class="text-red-600">*</span></label>
                    <div class="mt-2">
                        <input id="name" name="holdercard[holderName]" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if($errors->has('holdercard.holderName'))
                        @foreach ($errors->get('holdercard.holderName') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @endif
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="cpfCnpj" class="block text-sm font-medium leading-6 text-gray-900">numero do
                            cartao <span class="text-red-600">*</span></label>

                    </div>
                    <div class="mt-2">
                        <input id="holdercard[number]" name="holdercard[number]" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if($errors->has('holdercard.number'))
                        @foreach ($errors->get('holdercard.number') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @endif
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="cpfCnpj" class="block text-sm font-medium leading-6 text-gray-900">mes de
                            expiracao <span class="text-red-600">*</span></label>

                    </div>
                    <div class="mt-2">
                        <input id="holdercard[expiryMonth]" name="holdercard[expiryMonth]" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if($errors->has('holdercard.expiryMonth'))
                        @foreach ($errors->get('holdercard.expiryMonth') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @endif
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="cpfCnpj" class="block text-sm font-medium leading-6 text-gray-900">ano de
                            expiracao <span class="text-red-600">*</span></label>

                    </div>
                    <div class="mt-2">
                        <input id="holdercard[expiryYear]" name="holdercard[expiryYear]" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if($errors->has('holdercard.expiryYear'))
                        @foreach ($errors->get('holdercard.expiryYear') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @endif
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="cpfCnpj" class="block text-sm font-medium leading-6 text-gray-900">codigo de
                            seguranca do cartao <span class="text-red-600">*</span></label>

                    </div>
                    <div class="mt-2">
                        <input id="holdercard[ccv]" name="holdercard[ccv]" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if($errors->has('holdercard.ccv'))
                        @foreach ($errors->get('holdercard.ccv') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @endif
                </div>


                <hr/>
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Nome <span
                                class="text-red-600">*</span></label>
                    <div class="mt-2">
                        <input id="name" name="holderinfo[name]" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if($errors->has('holderinfo.name'))
                        @foreach ($errors->get('holderinfo.name') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @endif
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="cpfCnpj" class="block text-sm font-medium leading-6 text-gray-900">email <span
                                    class="text-red-600">*</span></label>

                    </div>
                    <div class="mt-2">
                        <input id="holderinfo[email]" name="holderinfo[email]" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if($errors->has('holderinfo.email'))
                        @foreach ($errors->get('holderinfo.email') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @endif
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="cpfCnpj" class="block text-sm font-medium leading-6 text-gray-900">Documento
                            (CPF
                            ou CNPJ) <span class="text-red-600">*</span></label>

                    </div>
                    <div class="mt-2">
                        <input id="holderinfo[cpfCnpj]" name="holderinfo[cpfCnpj]" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if($errors->has('holderinfo.cpfCnpj'))
                        @foreach ($errors->get('holderinfo.cpfCnpj') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @endif
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="cpfCnpj" class="block text-sm font-medium leading-6 text-gray-900">cep <span
                                    class="text-red-600">*</span></label>

                    </div>
                    <div class="mt-2">
                        <input id="holderinfo[postalCode]" name="holderinfo[postalCode]" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if($errors->has('holderinfo.postalCode'))
                        @foreach ($errors->get('holderinfo.postalCode') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @endif
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="cpfCnpj" class="block text-sm font-medium leading-6 text-gray-900">numero do
                            endereco <span class="text-red-600">*</span></label>

                    </div>
                    <div class="mt-2">
                        <input id="holderinfo[addressNumber]" name="holderinfo[addressNumber]" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if($errors->has('holderinfo.addressNumber'))
                        @foreach ($errors->get('holderinfo.addressNumber') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @endif
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="cpfCnpj"
                               class="block text-sm font-medium leading-6 text-gray-900">complemento</label>

                    </div>
                    <div class="mt-2">
                        <input id="holderinfo[addressComplement]" name="holderinfo[addressComplement]" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if($errors->has('holderinfo.addressComplement'))
                        @foreach ($errors->get('holderinfo.addressComplement') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @endif
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="cpfCnpj" class="block text-sm font-medium leading-6 text-gray-900">
                            Telefone <span class="text-red-600">*</span></label>

                    </div>
                    <div class="mt-2">
                        <input id="holderinfo[phone]" name="holderinfo[phone]" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if($errors->has('holderinfo.phone'))
                        @foreach ($errors->get('holderinfo.phone') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @endif
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="cpfCnpj"
                               class="block text-sm font-medium leading-6 text-gray-900">celular</label>

                    </div>
                    <div class="mt-2">
                        <input id="holderinfo[mobilePhone]" name="holderinfo[mobilePhone]" type="text"
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @if($errors->has('holderinfo.mobilePhone'))
                        @foreach ($errors->get('holderinfo.mobilePhone') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    @endif
                </div>
                <div>
                    <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Pagar
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
