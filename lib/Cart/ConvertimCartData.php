<?php

namespace Convertim\Cart;

class ConvertimCartData implements \JsonSerializable
{
    /**
     * @var \Convertim\Cart\ConvertimCartItem[]
     */
    private $items;

    /**
     * @var \Convertim\Cart\ConvertimPromoCode[]
     */
    private $promoCodes;

    /**
     * @param \Convertim\Cart\ConvertimCartItem[]  $items
     * @param \Convertim\Cart\ConvertimPromoCode[] $promoCodes
     */
    public function __construct(array $items, array $promoCodes)
    {
        $this->items = $items;
        $this->promoCodes = $promoCodes;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'items' => $this->items,
            'promoCodes' => $this->promoCodes,
        ];
    }
}
