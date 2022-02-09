<?php

namespace Convertim\Customer;

abstract class Address implements \JsonSerializable
{
    /**
     * @var string
     */
    protected $uuid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
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
     * @param string $uuid
     * @param string $name
     * @param string $lastName
     * @param string|null $street
     * @param string|null $city
     * @param string|null $postCode
     * @param string|null $country
     */
    public function __construct(
        $uuid,
        $name,
        $lastName,
        $street = null,
        $city = null,
        $postCode = null,
        $country = null
    ) {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->street = $street;
        $this->city = $city;
        $this->postCode = $postCode;
        $this->country = $country;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'lastName' => $this->lastName,
            'street' => $this->street,
            'city' => $this->city,
            'postCode' => $this->postCode,
            'country' => $this->country,
        ];
    }
}
