<?php

namespace Analytics\V2;

use PHPUnit\Framework\TestCase;
use Convertim\Analytics\V2\ConvertimAnalyticsV2DataFactory;

class ConvertimAnalyticsV2DataFactoryTest extends TestCase
{
    public function testCreateVisitsConvertimAnalyticsData()
    {
        $convertimAnalyticsData = ConvertimAnalyticsV2DataFactory::createVisitAnalyticsData(
            'rowUuid',
            'customerDeviceUuid',
            'DEVICE',
            'ESHOP',
            'customerHash',
            '127.0.0.1',
            'Gecko/Chrome'
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode($convertimAnalyticsData),
            json_encode([
                'uuid' => 'rowUuid',
                'type' => 'visit',
                'customerDeviceUuid' => 'customerDeviceUuid',
                'variant' => 'original',
                'device' => 'DEVICE',
                'eshop' => 'ESHOP',
                'customerHash' => 'customerHash',
                'external' => true,
                'ipAddress' => '127.0.0.1',
                'userAgent' => 'Gecko/Chrome',
                'openType' => 'click',
                'relationId' => null,
            ])
        );
    }

    public function testCreateOrderConvertimAnalyticsData()
    {
        $convertimAnalyticsData = ConvertimAnalyticsV2DataFactory::createOrderAnalyticsData(
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
