<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body>
<div class="px-4 sm:px-6 lg:px-8">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">Products</h1>

        </div>

    </div>
    <x-alert
            :type="session('result')"
            :content="session('content')"/>
    <div class="mt-8 flow-root w-full">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                            Name
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Description
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Price</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Options</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach($products as $product)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{$product['name']}}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$product['description']}}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$product['price']}}</td>
                            <td>
                                <a href="{{route('pay')}}?product={{$product['id']}}&billingType=PIX">Pix</a>|
                                <a href="{{route('pay')}}?product={{$product['id']}}&billingType=CREDIT_CARD">Credit
                                    Card</a>|
                                <a href="{{route('pay')}}?product={{$product['id']}}&billingType=TICKET">Ticket</a>
                            </td>
                        </tr>

                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
