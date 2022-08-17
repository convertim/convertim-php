<?php

namespace Convertim\Analytics;

class ConvertimAnalyticsData implements \JsonSerializable
{
    const EXPERIMENT_VARIANT_ORIGINAL = 'original';

    const DEVICE_DESKTOP = 'desktop';
    const DEVICE_MOBILE = 'mobile';

    const ACTION_OPEN = 'open';
    const ACTION_ORDER = 'order';
    const ACTION_CLOSE = 'close';

    /**
     * @var string
     */
    private $deviceUuid;

    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $eshop;

    /**
     * @var string
     */
    private $totalCustomersCountOfOrders;

    /**
     * @var string
     */
    private $device;

    /**
     * @var boolean
     */
    private $external;

    /**
     * @var string
     */
    private $variant;

    /**
     * @var string
     */
    private $ipAddress;

    /**
     * @var string
     */
    private $hash;

    /**
     * @param string $deviceUuid
     * @param string $action
     * @param string $eshop
     * @param string $totalCustomersCountOfOrders
     * @param string $device
     * @param string $ipAddress
     * @param string $hash
     */
    public function __construct($deviceUuid, $action, $eshop, $totalCustomersCountOfOrders, $device, $ipAddress, $hash)
    {
        $this->deviceUuid = $deviceUuid;
        $this->action = $action;
        $this->eshop = $eshop;
        $this->totalCustomersCountOfOrders = $totalCustomersCountOfOrders;
        $this->device = $device;
        $this->ipAddress = $ipAddress;
        $this->hash = $hash;

        $this->external = true;
        $this->variant = self::EXPERIMENT_VARIANT_ORIGINAL;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'deviceUuid' => $this->deviceUuid,
            'action' => $this->action,
            'eshop' => $this->eshop,
            'totalCustomersCountOfOrders' => $this->totalCustomersCountOfOrders,
            'device' => $this->device,
            'external' => $this->external,
            'variant' => $this->variant,
            'ipAddress' => $this->ipAddress,
            'hash' => $this->hash,
        ];
    }
}
