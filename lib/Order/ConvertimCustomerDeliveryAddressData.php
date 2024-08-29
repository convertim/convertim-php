<?php

namespace Convertim\Order;

class ConvertimCustomerDeliveryAddressData extends ConvertimCustomerAbstractAddressData
{
    /**
     * @var string|null
     */
    private $companyName;

    /**
     * @var string|null
     */
    private $currierTelephonePrefix;

    /**
     * @var string|null
     */
    private $currierTelephoneNumber;

    /**
     * @param string|null $uuid
     * @param string|null $name
     * @param string|null $lastName
     * @param string|null $street
     * @param string|null $city
     * @param string|null $postCode
     * @param string|null $country
     * @param string|null $companyName
     * @param string|null $currierTelephonePrefix
     * @param string|null $currierTelephoneNumber
     * @param \Convertim\Customer\RomaniaData|null $romaniaData
     * @param string|null $houseNumber
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
        $currierTelephonePrefix = null,
        $currierTelephoneNumber = null,
        $romaniaData = null,
        $houseNumber = null
    ) {
        parent::__construct($uuid, $name, $lastName, $street, $city, $postCode, $country, $romaniaData, $houseNumber);

        $this->companyName = $companyName;
        $this->currierTelephonePrefix = $currierTelephonePrefix;
        $this->currierTelephoneNumber = $currierTelephoneNumber;
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
    public function getCurrierTelephonePrefix()
    {
        return $this->currierTelephonePrefix;
    }

    /**
     * @return string|null
     */
    public function getCurrierTelephoneNumber()
    {
        return $this->currierTelephoneNumber;
    }

    /**
     * @return string|null
     */
    public function getCurrierTelephoneNumberWithPrefix()
    {
        return $this->currierTelephonePrefix . $this->currierTelephoneNumber;
    }
}
