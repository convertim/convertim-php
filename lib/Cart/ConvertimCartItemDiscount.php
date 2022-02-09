<?php

namespace Convertim\Cart;

class ConvertimCartItemDiscount
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $discount;

    /**
     * @param string $code
     * @param string $discount
     */
    public function __construct($code, $discount)
    {
        $this->code = $code;
        $this->discount = $discount;
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
    public function getDiscount()
    {
        return $this->discount;
    }
}
