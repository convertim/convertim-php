<?php

namespace Convertim\Analytics\V2;

class ConvertimVisitsAnalyticsData extends ConvertimBaseAnalyticsData implements \JsonSerializable
{

    const CONVERTIM_ORIGINAL_OPEN_TYPE = 'click';

    private $ipAddress;
    private $userAgent;

    /**
     * @param string $uuid
     * @param string $customerDeviceUuid
     * @param string $device
     * @param string $eshop
     * @param string $customerHash
     */
    public function __construct($uuid, $customerDeviceUuid, $device, $eshop, $customerHash, $ipAddress, $userAgent)
    {
        parent::__construct($uuid, $customerDeviceUuid, $device, $eshop, $customerHash);

        $this->ipAddress = $ipAddress;
        $this->userAgent = $userAgent;
    }


    public function jsonSerialize()
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'ipAddress' => $this->ipAddress,
                'openType' => self::CONVERTIM_ORIGINAL_OPEN_TYPE,
                'userAgent' => $this->userAgent,
                'relationId' => null,
            ]
        );
    }
}
