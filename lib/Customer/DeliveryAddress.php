<?php

namespace Convertim\Customer;

class DeliveryAddress extends Address
{
    /**
     * @var string|null
     */
    private $companyName;

    /**
     * @var string|null
     */
    private $carrierTelephoneNumber;

    /**
     * @param string $uuid
     * @param string $name
     * @param string $lastName
     * @param string|null $street
     * @param string|null $city
     * @param string|null $postCode
     * @param string|null $country
     * @param string|null $companyName
     * @param string|null $carrierTelephoneNumber
     * @param \Convertim\Customer\RomaniaData|null $romaniaData
     */
    public function __construct(
        $uuid,
        $name,
        $lastName,
        $street = null,
        $city = null,
        $postCode = null,
        $country = null,
        $companyName = null,
        $carrierTelephoneNumber = null,
        $romaniaData = null
    ) {
        parent::__construct($uuid, $name, $lastName, $street, $city, $postCode, $country, $romaniaData);

        $this->companyName = $companyName;
        $this->carrierTelephoneNumber = $carrierTelephoneNumber;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return array_merge(
            parent::jsonSerialize(),
            [
                'companyName' => $this->companyName,
                'carrierTelephoneNumber' => $this->carrierTelephoneNumber,
            ]
        );
    }
}
