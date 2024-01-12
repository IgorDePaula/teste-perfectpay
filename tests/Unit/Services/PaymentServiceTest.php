<?php

use App\Clients\Asaas\Method\Responses\PixResponse;
use App\Dtos\Asaas\Client;
use App\Enums\PaymentMethodEnum;
use App\Enums\PaymentStatusEnum;
use App\Exceptions\AsaasException;
use App\Models\Product;
use App\Repositories\PaymentRepository;
use App\Services\PaymentService;
use App\Supports\Result;

it('should create new payment using service', function () {
    $response = [
        'id' => 'test_id',
        'customer' => 'cus_10923k',
        'value' => 100,
        'netValue' => 91.04,
        'billingType' => PaymentMethodEnum::PIX->value,
        'status' => PaymentStatusEnum::PENDING->value,
        'dueDate' => '2024-05-06',
        'originalDueDate' => '2024-05-06',
        'invoiceUrl' => 'http://localhost/',
        'invoiceNumber' => '12345',
        'externalReference' => null,
    ];

    $request = [
        'customer' => 'cus_10923k',
        'billingType' => PaymentMethodEnum::PIX->value,
        'value' => 100,
        'dueDate' => '2024-05-06',
    ];
    $paymentRequest = App\Dtos\Asaas\PaymentRequest::fromArray($request);
    $paymentResponse = App\Dtos\Asaas\PaymentResponse::fromArray($response);

    $repository = Mockery::mock(PaymentRepository::class)
        ->shouldReceive('requestPayment')->andReturn(Result::success($paymentResponse))->getMock();

    $repository->shouldReceive('pay')
        ->andReturn(Result::success(new PixResponse(['encodedImage' => '123'])));

    $service = new PaymentService($repository);
    $client = Client::fromArray(['name' => 'test', 'cpfCnpj' => '123', 'id' => '123']);
    $productModelMock = Mockery::mock(Product::class)->shouldReceive('getAttribute')
        ->with('price')->andReturn(23.4)->getMock();

    $response = $service->pay($client, $productModelMock, PaymentMethodEnum::PIX);
    expect($response->isSuccess())->toBeTrue();
    expect($response->getContent()->getResult())->toBeString()->not->toBeNull();

});

it('should got error with wrong customer', function () {

    $response = [
        'id' => 'test_id',
        'customer' => 'cus_10923k',
        'value' => 100,
        'netValue' => 91.04,
        'billingType' => PaymentMethodEnum::PIX->value,
        'status' => PaymentStatusEnum::PENDING->value,
        'dueDate' => '2024-05-06',
        'originalDueDate' => '2024-05-06',
        'invoiceUrl' => 'http://localhost/',
        'invoiceNumber' => '12345',
        'externalReference' => null,
    ];

    $request = [
        'customer' => '',
        'billingType' => PaymentMethodEnum::PIX->value,
        'value' => 100,
        'dueDate' => '2024-05-06',
    ];
    $paymentRequest = App\Dtos\Asaas\PaymentRequest::fromArray($request);

    $repository = Mockery::mock(PaymentRepository::class)
        ->shouldReceive('requestPayment')->andReturn(Result::failure(new AsaasException('Customer inválido ou não informado.')))->getMock();

    $service = new PaymentService($repository);

    $client = Client::fromArray(['name' => 'test', 'cpfCnpj' => '123', 'id' => '123']);
    $productModelMock = Mockery::mock(Product::class)->shouldReceive('getAttribute')
        ->with('price')->andReturn(23.4)->getMock();

    $response = $service->pay($client, $productModelMock, PaymentMethodEnum::PIX);

    expect($response->isError())->toBeTrue();
    expect($response->getContent()->getMessage())->toBe('Customer inválido ou não informado.');

});
