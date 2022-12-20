<?php

namespace Analytics\V2;

use Convertim\Analytics\V2\ConvertimOrderAnalyticsData;
use PHPUnit\Framework\TestCase;

class ConvertimOrderAnalyticsDataTest extends TestCase
{
    public function testIsConvertimOrderAnalyticsDataValid()
    {
        $convertimAnalyticsData = new ConvertimOrderAnalyticsData(
            'rowUuid',
            'customerDeviceUuid',
            'DEVICE',
            'ESHOP',
            'customerHash',
            'orderUuid',
            2,
            34.123456,
            24.123456,
            5,
            3.123456,
            1.123456
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode($convertimAnalyticsData),
            json_encode([
                'uuid' => 'rowUuid',
                'type' => 'order',
                'customerDeviceUuid' => 'customerDeviceUuid',
                'variant' => 'original',
                'device' => 'DEVICE',
                'eshop' => 'ESHOP',
                'customerHash' => 'customerHash',
                'external' => true,
                'orderUuid' => 'orderUuid',
                'totalCustomersCountOfOrders' => 2,
                'orderPriceWithVat' => '34.12346',
                'orderPriceWithoutVat' => '24.12346',
                'itemCount' => 5,
                'transportPrice' => '3.12346',
                'paymentPrice' => '1.12346',
                'relationId' => null,
            ])
        );
    }
}
