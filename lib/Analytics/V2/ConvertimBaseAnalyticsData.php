<?php

namespace Convertim\Analytics\V2;

abstract class ConvertimBaseAnalyticsData implements \JsonSerializable
{

    const CONVERTIM_VARIANT = 'original';

    /**
     * @var string
     */
    private $uuid;

    /**
     * @var string
     */
    private $customerDeviceUuid;

    /**
     * @var string
     */
    private $device;

    /**
     * @var string
     */
    private $eshop;

    /**
     * @var string
     */
    private $customerHash;

    /**
     * @param string $uuid
     * @param string $customerDeviceUuid
     * @param string $device
     * @param string $eshop
     * @param string $customerHash
     */
    public function __construct($uuid, $customerDeviceUuid, $device, $eshop, $customerHash)
    {
        $this->uuid = $uuid;
        $this->customerDeviceUuid = $customerDeviceUuid;
        $this->device = $device;
        $this->eshop = $eshop;
        $this->customerHash = $customerHash;
    }

    public function jsonSerialize()
    {
        return [
            'uuid' => $this->uuid,
            'customerDeviceUuid' => $this->customerDeviceUuid,
            'variant' => self::CONVERTIM_VARIANT,
            'device' => $this->device,
            'eshop' => $this->eshop,
            'customerHash' => $this->customerHash,
            'external' => true,
        ];
    }
}
