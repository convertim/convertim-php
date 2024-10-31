<?php

namespace Convertim\Cart;

class ConvertimCustomValidationZipCityResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $city;

    /**
     * @param string $id
     * @param string $city
     */
    public function __construct($id, $city)
    {
        $this->id = $id;
        $this->city = $city;
    }

    #[\ReturnTypeWillChange]
    function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'city' => $this->city,
        ];
    }
}
