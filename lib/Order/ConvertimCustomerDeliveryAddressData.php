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
     * @param string|null $name
     * @param string|null $lastName
     * @param string|null $street
     * @param string|null $city
     * @param string|null $postCode
     * @param string|null $country
     * @param string|null $companyName
     * @param string|null $currierTelephonePrefix
     * @param string|null $currierTelephoneNumber
     */
    public function __construct(
        $name = null,
        $lastName = null,
        $street = null,
        $city = null,
        $postCode = null,
        $country = null,
        $companyName = null,
        $currierTelephonePrefix = null,
        $currierTelephoneNumber = null
    ) {
        parent::__construct($name, $lastName, $street, $city, $postCode, $country);

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
