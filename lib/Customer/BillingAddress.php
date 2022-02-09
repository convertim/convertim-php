<?php

namespace Convertim\Customer;

class BillingAddress extends Address
{
    /**
     * @var string|null
     */
    private $companyName;

    /**
     * @var string|null
     */
    private $identificationNumber;

    /**
     * @var string|null
     */
    private $vatNumber;

    /**
     * @param string $uuid
     * @param string $name
     * @param string $lastName
     * @param string|null $street
     * @param string|null $city
     * @param string|null $postCode
     * @param string|null $country
     * @param string|null $companyName
     * @param string|null $identificationNumber
     * @param string|null $vatNumber
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
        $identificationNumber = null,
        $vatNumber = null
    ) {
        parent::__construct($uuid, $name, $lastName, $street, $city, $postCode, $country);

        $this->companyName = $companyName;
        $this->identificationNumber = $identificationNumber;
        $this->vatNumber = $vatNumber;
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
                'identificationNumber' => $this->identificationNumber,
                'vatNumber' => $this->vatNumber,
            ]
        );
    }
}
