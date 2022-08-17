<?php

namespace Convertim\Analytics;

class ConvertimAnalyticsDataFactory
{
    /**
     * @param string $deviceUuid
     * @param string $eshop
     * @param string $device
     * @param string $ipAddress
     * @param string $hash
     * @return \Convertim\Analytics\ConvertimAnalyticsData
     */
    public static function createOpenAnalyticsData($deviceUuid, $eshop, $device, $ipAddress, $hash)
    {
        return new ConvertimAnalyticsData(
            $deviceUuid,
            ConvertimAnalyticsData::ACTION_OPEN,
            $eshop,
            0,
            $device,
            $ipAddress,
            $hash
        );
    }

    /**
     * @param string $deviceUuid
     * @param string $eshop
     * @param string $device
     * @param string $ipAddress
     * @param string $hash
     * @return \Convertim\Analytics\ConvertimAnalyticsData
     */
    public static function createCloseAnalyticsData($deviceUuid, $eshop, $device, $ipAddress, $hash)
    {
        return new ConvertimAnalyticsData(
            $deviceUuid,
            ConvertimAnalyticsData::ACTION_CLOSE,
            $eshop,
            0,
            $device,
            $ipAddress,
            $hash
        );
    }

    /**
     * @param string $deviceUuid
     * @param string $eshop
     * @param string $device
     * @param string $ipAddress
     * @param string $hash
     * @param int $totalCustomersCountOfOrders
     * @return \Convertim\Analytics\ConvertimAnalyticsData
     */
    public static function createOrderAnalyticsData($deviceUuid, $eshop, $device, $ipAddress, $hash, $totalCustomersCountOfOrders)
    {
        return new ConvertimAnalyticsData(
            $deviceUuid,
            ConvertimAnalyticsData::ACTION_ORDER,
            $eshop,
            $totalCustomersCountOfOrders,
            $device,
            $ipAddress,
            $hash
        );
    }
}
