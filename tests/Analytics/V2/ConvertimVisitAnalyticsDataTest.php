<?php

namespace Analytics\V2;

use Convertim\Analytics\V2\ConvertimOrderAnalyticsData;
use Convertim\Analytics\V2\ConvertimVisitsAnalyticsData;
use PHPUnit\Framework\TestCase;

class ConvertimVisitAnalyticsDataTest extends TestCase
{
    public function testIsConvertimOrderAnalyticsDataValid()
    {
        $convertimAnalyticsData = new ConvertimVisitsAnalyticsData(
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
}
