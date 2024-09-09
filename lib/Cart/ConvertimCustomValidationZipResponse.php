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
     * @param bool $isValid
     * @param string[] $cities
     */
    public function __construct(bool $isValid, array $cities)
    {
        $this->isValid = $isValid;
        $this->cities = $cities;
    }

    function jsonSerialize()
    {
        return [
            'isValid' => $this->isValid,
            'cities' => $this->cities,
        ];
    }
}
