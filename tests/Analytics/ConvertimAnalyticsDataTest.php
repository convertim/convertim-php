<?php

namespace Analytics;

use Convertim\Analytics\ConvertimAnalyticsData;
use PHPUnit\Framework\TestCase;

class ConvertimAnalyticsDataTest extends TestCase
{
    public function testIsConvertimAnalyticsDataValid()
    {
        $convertimAnalyticsData = new ConvertimAnalyticsData(
            'deviceUuid',
            'open',
            'dev',
            0,
            'mobile',
            '127.0.0.1',
            'hash',
            3,
            '33.33'
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode($convertimAnalyticsData),
            json_encode([
                'deviceUuid' => 'deviceUuid',
                'action' => 'open',
                'eshop' => 'dev',
                'totalCustomersCountOfOrders' => 0,
                'device' => 'mobile',
                'external' => true,
                'variant' => 'original',
                'ipAddress' => '127.0.0.1',
                'hash' => 'hash',
                'orderItemCount' => 3,
                'orderItemPrice' => '33.33',
            ])
        );
    }
}
