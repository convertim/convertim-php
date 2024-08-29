<?php

namespace Convertim\Order;

abstract class ConvertimCustomerAbstractAddressData
{
    /**
     * @var string|null
     */
    protected $uuid;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $lastName;

    /**
     * @var string|null
     */
    protected $street;

    /**
     * @var string|null
     */
    protected $houseNumber;

    /**
     * @var string|null
     */
    protected $city;

    /**
     * @var string|null
     */
    protected $postCode;

    /**
     * @var string|null
     */
    protected $country;

    /**
     * @var \Convertim\Customer\RomaniaData|null
     */
    protected $romaniaData;

    /**
     * @param string|null $uuid
     * @param string|null $name
     * @param string|null $lastName
     * @param string|null $street
     * @param string|null $city
     * @param string|null $postCode
     * @param string|null $country
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
        $romaniaData = null,
        $houseNumber = null,
    ) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->street = $street;
        $this->houseNumber = $houseNumber;
        $this->city = $city;
        $this->postCode = $postCode;
        $this->country = $country;
        $this->romaniaData = $romaniaData;
    }

    /**
     * @return string|null
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string|null
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return string|null
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string|null
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * @return string|null
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return \Convertim\Customer\RomaniaData|null
     */
    public function getRomaniaData()
    {
        return $this->romaniaData;
    }

    /**
     * @return string|null
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }
}
