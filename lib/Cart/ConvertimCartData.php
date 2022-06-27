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
     * @var array
     */
    private $extras;

    /**
     * @param \Convertim\Cart\ConvertimCartItem[] $items
     * @param \Convertim\Cart\ConvertimPromoCode[] $promoCodes
     * @param array $extras
     */
    public function __construct(array $items, array $promoCodes, array $extras = [])
    {
        $this->items = $items;
        $this->promoCodes = $promoCodes;
        $this->extras = $extras;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'items' => $this->items,
            'promoCodes' => $this->promoCodes,
            'extras' => $this->extras,
        ];
    }
}
