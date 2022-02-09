<?php

namespace Convertim\Customer;

class LoginDetail implements \JsonSerializable
{
    /**
     * @var string
     */
    private $customerUuid;

    /**
     * @var string
     */
    private $telephoneNumber;

    /**
     * @param $customerUuid
     * @param $telephoneNumber
     */
    public function __construct($customerUuid, $telephoneNumber)
    {
        $this->customerUuid = $customerUuid;
        $this->telephoneNumber = $telephoneNumber;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'customerUuid' => $this->customerUuid,
            'telephoneNumber' => $this->telephoneNumber,
        ];
    }
}
