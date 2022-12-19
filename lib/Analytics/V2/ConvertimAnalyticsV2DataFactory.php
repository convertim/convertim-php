<?php

namespace Convertim\Analytics\V2;

class ConvertimAnalyticsV2DataFactory
{
    /**
     * @param string $uuid
     * @param string $customerDeviceUuid
     * @param string $device
     * @param string $eshop
     * @param string $customerHash
     * @param string $ipAddress
     * @param string $userAgent
     * @return \Convertim\Analytics\V2\ConvertimVisitsAnalyticsData
     */
    public static function createVisitAnalyticsData($uuid, $customerDeviceUuid, $device, $eshop, $customerHash, $ipAddress, $userAgent)
    {
        return new ConvertimVisitsAnalyticsData(
            $uuid,
            $customerDeviceUuid,
            $device,
            $eshop,
            $customerHash,
            $ipAddress,
            $userAgent
        );
    }

    /**
     * @param string $uuid
     * @param string $customerDeviceUuid
     * @param string $device
     * @param string $eshop
     * @param string $customerHash
     * @param string $orderUuid
     * @param float|int|string $totalCustomersCountOfOrders
     * @param float|int|string $orderPriceWithVat
     * @param float|int|string $orderPriceWithoutVat
     * @param float|int|string $itemCount
     * @param float|int|string $transportPrice
     * @param float|int|string $paymentPrice
     * @return \Convertim\Analytics\V2\ConvertimOrderAnalyticsData
     */
    public static function createOrderAnalyticsData(
        $uuid,
        $customerDeviceUuid,
        $device,
        $eshop,
        $customerHash,
        $orderUuid,
        $totalCustomersCountOfOrders,
        $orderPriceWithVat,
        $orderPriceWithoutVat,
        $itemCount,
        $transportPrice,
        $paymentPrice
    ) {
        return new ConvertimOrderAnalyticsData(
            $uuid,
            $customerDeviceUuid,
            $device,
            $eshop,
            $customerHash,
            $orderUuid,
            $totalCustomersCountOfOrders,
            $orderPriceWithVat,
            $orderPriceWithoutVat,
            $itemCount,
            $transportPrice,
            $paymentPrice
        );
    }
}
