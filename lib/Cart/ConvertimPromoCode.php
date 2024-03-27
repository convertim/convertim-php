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
     * @var string
     */
    private $description;

    /**
     * @param string $uuid
     * @param string $code
     * @param string $discount
     * @param string $description
     */
    public function __construct($uuid, $code, $discount, $description = null)
    {
        $this->uuid = $uuid;
        $this->code = $code;
        $this->discount = $discount;
        $this->description = $description;
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
            'description' => $this->description,
        ];
    }
}
