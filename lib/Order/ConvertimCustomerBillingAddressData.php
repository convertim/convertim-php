<?php

namespace Convertim\Order;

class ConvertimCustomerBillingAddressData extends ConvertimCustomerAbstractAddressData
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
     * @param string|null $uuid
     * @param string|null $name
     * @param string|null $lastName
     * @param string|null $street
     * @param string|null $city
     * @param string|null $postCode
     * @param string|null $country
     * @param string|null $companyName
     * @param string|null $identificationNumber
     * @param string|null $vatNumber
     * @param \Convertim\Customer\RomaniaData|null $romaniaData
     */
    public function __construct(
        $uuid = null,
        $name = null,
        $lastName = null,
        $street = null,
        $city = null,
        $postCode = null,
        $country = null,
        $companyName = null,
        $identificationNumber = null,
        $vatNumber = null,
        $romaniaData = null
    ) {
        parent::__construct($uuid, $name, $lastName, $street, $city, $postCode, $country, $romaniaData);

        $this->companyName = $companyName;
        $this->identificationNumber = $identificationNumber;
        $this->vatNumber = $vatNumber;
    }

    /**
     * @return string|null
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @return string|null
     */
    public function getIdentificationNumber()
    {
        return $this->identificationNumber;
    }

    /**
     * @return string|null
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }
}
