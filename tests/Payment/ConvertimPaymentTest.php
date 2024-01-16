<?php

use Convertim\Payment\ConvertimPayment;
use Convertim\Payment\ConvertimPaymentType;
use PHPUnit\Framework\TestCase;

class ConvertimPaymentTest extends TestCase
{
    public function testIsConvertimPaymentTransformValid()
    {
        $convertimPayment = new ConvertimPayment(
            '1111-1111-1111-1111',
            ConvertimPaymentType::CONVERTIM_PAYMENT_TYPE_CASH_ON_DELIVERY,
            'payment',
            '121',
            '100',
            '21',
            'path/to/image',
            [],
            [],
            'description',
            []
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode($convertimPayment),
            json_encode([
                'uuid' => '1111-1111-1111-1111',
                'type' => 'cash_on_delivery',
                'name' => 'payment',
                'priceWithVat' => '121',
                'priceWithoutVat' => '100',
                'vat' => '21',
                'image' => 'path/to/image',
                'gopay' => [],
                'adyen' => [],
                'paymentDescription' => 'description',
                'restrictedTransports' => [],
                'paymentInstruction' => null,
                'stripe' => null,
                'comgate' => null,
                'trustPay' => null,
            ])
        );
    }
}
