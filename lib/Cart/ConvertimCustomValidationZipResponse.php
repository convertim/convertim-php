<?php

namespace Convertim\Cart;

class ConvertimCustomValidationZipResponse implements \JsonSerializable
{
    /**
     * @var boolean
     */
    private $isValid;

    /**
     * @var string[]
     */
    private $cities;

    /**
     * @var array
     */
    private $extraData;

    /**
     * @param bool $isValid
     * @param string[] $cities
     * @param array $extraData
     */
    public function __construct($isValid, $cities, $extraData = [])
    {
        $this->isValid = $isValid;
        $this->cities = $cities;
        $this->extraData = $extraData;
    }

    function jsonSerialize()
    {
        return [
            'isValid' => $this->isValid,
            'cities' => $this->cities,
            'extraData' => $this->extraData,
        ];
    }
}
