<?php

namespace Convertim\Store;

use Convertim\Transport\ConvertimTransportSources;

class ConvertimStore implements \JsonSerializable
{

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var string
     */
    private $company;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $postcode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var \Convertim\Store\ConvertimStoreOpeningHour[]
     */
    private $hours;

    /**
     * @param string $code
     * @param string $latitude
     * @param string $longitude
     * @param string $company
     * @param string $street
     * @param string $postcode
     * @param string $city
     * @param \Convertim\Store\ConvertimStoreOpeningHour[] $hours
     */
    public function __construct($code, $latitude, $longitude, $company, $street, $postcode, $city, array $hours)
    {
        $this->code = $code;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->company = $company;
        $this->street = $street;
        $this->postcode = $postcode;
        $this->city = $city;
        $this->hours = $hours;
    }


    function jsonSerialize()
    {
        return [
            'code' => $this->code,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'company' =>   $this->company,
            'street' => $this->street,
            'postcode' => $this->postcode,
            'city' => $this->city,
            'hours' => $this->hours,
            'source' => ConvertimTransportSources::SOURCE_STORES,
        ];
    }
}
