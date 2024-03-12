<?php

namespace Convertim\Cart;

class ConvertimCartItemDiscountWithVatSplit
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $discountWithVat;

    /**
     * @var string
     */
    private $discountWithoutVat;

    /**
     * @param string $code
     * @param string $discountWithVat
     * @param string $discountWithoutVat
     */
    public function __construct($code, $discountWithVat, $discountWithoutVat)
    {
        $this->code = $code;
        $this->discountWithVat = $discountWithVat;
        $this->discountWithoutVat = $discountWithoutVat;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getDiscountWithVat()
    {
        return $this->discountWithVat;
    }

    /**
     * @return string
     */
    public function getDiscountWithoutVat()
    {
        return $this->discountWithoutVat;
    }
}
