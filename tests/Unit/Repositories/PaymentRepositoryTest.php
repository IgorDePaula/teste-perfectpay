<?php


use App\Clients\Asaas;
use App\Clients\Asaas\Client;
use App\Enums\PaymentStatusEnum;
use App\Enums\PaymentTypeEnum;
use App\Exceptions\AsaasException;
use App\Models\PaymentResponse;
use App\Repositories\AsaasRepository;
use App\Repositories\PaymentRepository;
use App\Supports\Result;

it('should create new payment using repository', function () {
    $response = [
        'id' => 'test_id',
        'customer' => 'cus_10923k',
        'value' => 100,
        'netValue' => 91.04,
        'billingType' => PaymentTypeEnum::PIX->value,
        'status' => PaymentStatusEnum::PENDING->value,
        'dueDate' => '2024-05-06',
        'originalDueDate' => '2024-05-06',
        'invoiceUrl' => 'http://localhost/',
        'invoiceNumber' => '12345',
        'externalReference' => null,
    ];

    $request = [
        'customer' => 'cus_10923k',
        'billingType' => PaymentTypeEnum::PIX->value,
        'value' => 100,
        'dueDate' => '2024-05-06',
    ];
    $paymentRequest = App\Dtos\Asaas\PaymentRequest::fromArray($request);
    $paymentResponse = App\Dtos\Asaas\PaymentResponse::fromArray($response);
    $paymentAction = Mockery::mock(Asaas\Payment::class)
        ->shouldReceive('requestNewPayment')->andReturn(Result::success($paymentResponse))->getMock();

    $client = Mockery::mock(Asaas::class)
        ->shouldReceive('payment')->andReturn($paymentAction)->getMock();
    $modelMock = Mockery::mock(PaymentResponse::class)
        ->shouldReceive('create')->andReturn(['id' => 1])->getMock();

    $repository = new PaymentRepository($client, $modelMock);
    $response = $repository->requestPayment($paymentRequest);

    expect($response->isSuccess())->toBeTrue();
    expect($response->getContent()->id)->not->toBeNull();

});

it('should got error with wrong customer', function () {

    $request = [
        'customer' => '',
        'billingType' => PaymentTypeEnum::PIX->value,
        'value' => 100,
        'dueDate' => '2024-05-06',
    ];
    $paymentRequest = App\Dtos\Asaas\PaymentRequest::fromArray($request);
    $paymentAction = Mockery::mock(Asaas\Payment::class)
        ->shouldReceive('requestNewPayment')->andReturn(Result::failure(new AsaasException('Customer inválido ou não informado.')))->getMock();

    $client = Mockery::mock(Asaas::class)
        ->shouldReceive('payment')->andReturn($paymentAction)->getMock();
    $modelMock = Mockery::mock(PaymentResponse::class)
        ->shouldReceive('create')->andReturn(['id' => 1])->getMock();

    $repository = new PaymentRepository($client, $modelMock);
    $response = $repository->requestPayment($paymentRequest);

    expect($response->isError())->toBeTrue();
    expect($response->getContent()->getMessage())->toBe('Customer inválido ou não informado.');

});
