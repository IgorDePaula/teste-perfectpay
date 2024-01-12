<?php

use App\Clients\Asaas\Method\Responses\PixResponse;

it('should get pix response', function () {
    $response = [
        'encodedImage' => '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',
        'payload' => '00020101021226730014br.gov.bcb.pix2551pix-h.asaas.com/pixqrcode/cobv/pay_76575613967995145204000053039865802BR5905ASAAS6009Joinville61088922827162070503***63045E7A',
        'expirationDate' => '2022-06-24 23:59:59',
    ];
    $pix = new PixResponse($response);
    expect($pix->getResult())->toBe($response['encodedImage']);
});
