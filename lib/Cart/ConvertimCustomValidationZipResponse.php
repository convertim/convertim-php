<?php

namespace Convertim\Cart;

class ConvertimCustomValidationZipResponse implements \JsonSerializable
{
    /**
     * @var boolean
     */
    private $isValid;

    /**
     * @var ConvertimCustomValidationZipCityResponse[]
     */
    private $cities;

    /**
     * @var array
     */
    private $extraData;

    /**
     * @param bool $isValid
     * @param ConvertimCustomValidationZipCityResponse[] $cities
     * @param array $extraData
     */
    public function __construct($isValid, $cities, $extraData = [])
    {
        $this->isValid = $isValid;
        $this->cities = $cities;
        $this->extraData = $extraData;
    }

    #[\ReturnTypeWillChange]
    function jsonSerialize()
    {
        return [
            'isValid' => $this->isValid,
            'cities' => $this->cities,
            'extraData' => $this->extraData,
        ];
    }
}
