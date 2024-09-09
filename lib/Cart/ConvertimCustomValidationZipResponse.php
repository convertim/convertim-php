<?php

namespace Convertim\Cart;

class ConvertimCustomValidationZipResponse
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

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * @return string[]
     */
    public function getCities(): array
    {
        return $this->cities;
    }
}
