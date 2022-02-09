<?php

namespace Convertim\Cart;

class ConvertimPromoCode implements \JsonSerializable
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $discount;

    /**
     * @param string $uuid
     * @param string $code
     * @param string $discount
     */
    public function __construct($uuid, $code, $discount)
    {
        $this->uuid = $uuid;
        $this->code = $code;
        $this->discount = $discount;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'uuid' => $this->uuid,
            'code' => $this->code,
            'discount' => $this->discount,
        ];
    }
}
