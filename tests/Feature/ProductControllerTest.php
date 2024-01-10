<?php

use App\Http\Controllers\ProductController;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

it('should see productd', function () {
    $mockData = [['name' => 'Teste']];
    $mockResult = ['products' => [['name' => 'Teste']]];

    $request = Mockery::mock(Request::class);
    $service = Mockery::mock(ProductService::class)
        ->shouldReceive('getAllProducts')
        ->andReturn(JsonResource::collection($mockData))
        ->getMock();

    $controller = new ProductController($service);
    expect($controller->index($request)->getData())->toBeArray()
        ->and($controller->index($request)->getData())->toMatchArray($mockResult);
});
