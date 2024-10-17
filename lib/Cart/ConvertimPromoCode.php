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
     * @var boolean
     */
    private $isVisible;

    /**
     * @param string $uuid
     * @param string $code
     * @param string $discount
     * @param string $description
     * @param boolean $isVisible
     */
    public function __construct($uuid, $code, $discount, $description = null, $isVisible = true)
    {
        $this->uuid = $uuid;
        $this->code = $code;
        $this->discount = $discount;
        $this->description = $description;
        $this->isVisible = $isVisible;
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
            'isVisible' => $this->isVisible,
        ];
    }
}
