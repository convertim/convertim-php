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
     * @param string|null $uuid
     * @param string|null $name
     * @param string|null $lastName
     * @param string|null $street
     * @param string|null $city
     * @param string|null $postCode
     * @param string|null $country
     */
    public function __construct(
        $uuid = null,
        $name = null,
        $lastName = null,
        $street = null,
        $city = null,
        $postCode = null,
        $country = null
    ) {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->street = $street;
        $this->city = $city;
        $this->postCode = $postCode;
        $this->country = $country;
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
}
