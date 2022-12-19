<?php

namespace Convertim\Analytics\V2;

class ConvertimOrderAnalyticsData extends ConvertimBaseAnalyticsData implements \JsonSerializable
{
    /**
     * @var string
     */
    private $orderUuid;

    /**
     * @var numeric
     */
    private $totalCustomersCountOfOrders;

    /**
     * @var numeric
     */
    private $orderPriceWithVat;

    /**
     * @var numeric
     */
    private $orderPriceWithoutVat;

    /**
     * @var numeric
     */
    private $itemCount;

    /**
     * @var numeric
     */
    private $transportPrice;

    /**
     * @var numeric
     */
    private $paymentPrice;

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
     */
    public function __construct($uuid, $customerDeviceUuid, $device, $eshop, $customerHash, $orderUuid, $totalCustomersCountOfOrders, $orderPriceWithVat, $orderPriceWithoutVat, $itemCount, $transportPrice, $paymentPrice)
    {
        parent::__construct($uuid, $customerDeviceUuid, $device, $eshop, $customerHash);

        $this->orderUuid = $orderUuid;
        $this->totalCustomersCountOfOrders = $totalCustomersCountOfOrders;
        $this->orderPriceWithVat = $orderPriceWithVat;
        $this->orderPriceWithoutVat = $orderPriceWithoutVat;
        $this->itemCount = $itemCount;
        $this->transportPrice = $transportPrice;
        $this->paymentPrice = $paymentPrice;
    }


    public function jsonSerialize()
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'orderUuid' => $this->orderUuid,
                'totalCustomersCountOfOrders' => $this->totalCustomersCountOfOrders,
                'orderPriceWithVat' => number_format((float)$this->orderPriceWithVat, 5, '.', ''),
                'orderPriceWithoutVat' => number_format((float)$this->orderPriceWithoutVat, 5, '.', ''),
                'itemCount' => $this->itemCount,
                'transportPrice' => number_format((float)$this->transportPrice, 5, '.', ''),
                'paymentPrice' => number_format((float)$this->paymentPrice, 5, '.', ''),
                'relationId' => null,
            ]
        );
    }
}
