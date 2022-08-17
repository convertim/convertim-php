<?php

namespace Analytics;

use Convertim\Analytics\ConvertimAnalyticsDataFactory;
use PHPUnit\Framework\TestCase;

class ConvertimAnalyticsDataFactoryTest extends TestCase
{
    public function testCreateOpenConvertimAnalyticsData()
    {
        $convertimAnalyticsData = ConvertimAnalyticsDataFactory::createOpenAnalyticsData(
            'deviceUuid',
            'dev',
            'mobile',
            '127.0.0.1',
            'hash'
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
                'orderItemCount' => 0,
                'orderItemPrice' => null,
            ])
        );
    }

    public function testCreateCloseConvertimAnalyticsData()
    {
        $convertimAnalyticsData = ConvertimAnalyticsDataFactory::createCloseAnalyticsData(
            'deviceUuid',
            'dev',
            'mobile',
            '127.0.0.1',
            'hash'
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode($convertimAnalyticsData),
            json_encode([
                'deviceUuid' => 'deviceUuid',
                'action' => 'close',
                'eshop' => 'dev',
                'totalCustomersCountOfOrders' => 0,
                'device' => 'mobile',
                'external' => true,
                'variant' => 'original',
                'ipAddress' => '127.0.0.1',
                'hash' => 'hash',
                'orderItemCount' => 0,
                'orderItemPrice' => null,
            ])
        );
    }

    public function testCreateOrderConvertimAnalyticsData()
    {
        $convertimAnalyticsData = ConvertimAnalyticsDataFactory::createOrderAnalyticsData(
            'deviceUuid',
            'dev',
            'mobile',
            '127.0.0.1',
            'hash',
            5,
            3,
            '33.33'
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode($convertimAnalyticsData),
            json_encode([
                'deviceUuid' => 'deviceUuid',
                'action' => 'order',
                'eshop' => 'dev',
                'totalCustomersCountOfOrders' => 5,
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
