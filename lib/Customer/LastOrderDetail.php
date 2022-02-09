<?php

namespace Convertim\Customer;

class LastOrderDetail implements \JsonSerializable
{
    /**
     * @var string
     */
    private $orderUuid;

    /**
     * @var string
     */
    private $telephoneNumber;

    /**
     * @param string $orderUuid
     * @param string $telephoneNumber
     */
    public function __construct($orderUuid, $telephoneNumber)
    {
        $this->orderUuid = $orderUuid;
        $this->telephoneNumber = $telephoneNumber;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'orderUuid' => $this->orderUuid,
            'telephoneNumber' => $this->telephoneNumber,
        ];
    }
}
