<?php

namespace Convertim\Cart;

class ConvertimCartItem implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var numeric
     */
    private $quantity;

    /**
     * @var string
     */
    private $priceWithoutVat;

    /**
     * @var string
     */
    private $priceWithVat;

    /**
     * @var string
     */
    private $loyaltyPoints;

    /**
     * @var string
     */
    private $vat;

    /**
     * @var string
     */
    private $image;

    /**
     * @var string[]
     */
    private $gtm;

    /**
     * @var \Convertim\Cart\ConvertimCartItemDiscount[]|\Convertim\Cart\ConvertimCartItemDiscountWithVatSplit[]
     */
    private $discounts;

    /**
     * @var \Convertim\Cart\ConvertimCartItemAdditional[]
     */
    private $additional;

    /**
     * @var string[]
     */
    private $labels;

    /**
     * @var string[]
     */
    private $extra;

    /**
     * @var string|null
     */
    private $availability;

    /**
     * @var \Convertim\Cart\ConvertimCartItemService[]
     */
    private $cartItemServices;

    /**
     * @param string $id
     * @param string $name
     * @param float|int|string $quantity
     * @param string $priceWithoutVat
     * @param string $priceWithVat
     * @param string $vat
     * @param string $image
     * @param string[] $gtm
     * @param \Convertim\Cart\ConvertimCartItemDiscount[]|\Convertim\Cart\ConvertimCartItemDiscountWithVatSplit[] $discounts
     * @param \Convertim\Cart\ConvertimCartItemAdditional[] $additional
     * @param string[] $labels
     * @param array $extra
     * @param string|null $availability
     * @param \Convertim\Cart\ConvertimCartItemService[] $cartItemServices
     */
    public function __construct(
        $id,
        $name,
        $quantity,
        $priceWithoutVat,
        $priceWithVat,
        $vat,
        $image,
        $gtm = [],
        $discounts = [],
        $additional = [],
        $labels = [],
        $extra = [],
        $availability = null,
        $loyaltyPoints = null,
        $cartItemServices = []
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->priceWithoutVat = $priceWithoutVat;
        $this->priceWithVat = $priceWithVat;
        $this->vat = $vat;
        $this->image = $image;
        $this->gtm = $gtm;
        $this->discounts = $discounts;
        $this->additional = $additional;
        $this->labels = $labels;
        $this->extra = $extra;
        $this->availability = $availability;
        $this->loyaltyPoints = $loyaltyPoints;
        $this->cartItemServices = $cartItemServices;
    }

    private function serializeDiscount()
    {
        return array_reduce(
            $this->discounts,
            function ($transformedDiscount, $item) {
                if ($item instanceof ConvertimCartItemDiscount) {
                    $transformedDiscount[$item->getCode()] = $item->getDiscount();
                } elseif ($item instanceof ConvertimCartItemDiscountWithVatSplit) {
                    $transformedDiscount[$item->getCode()] = [
                        'withVat' => $item->getDiscountWithVat(),
                        'withoutVat' => $item->getDiscountWithoutVat(),
                    ];
                }

                return $transformedDiscount;
            },
            []
        );
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'priceWithoutVat' => $this->priceWithoutVat,
            'priceWithVat' => $this->priceWithVat,
            'vat' => $this->vat,
            'image' => $this->image,
            'gtm' => $this->gtm,
            'discounts' => $this->serializeDiscount(),
            'additional' => $this->additional,
            'labels' => $this->labels,
            'extra' => $this->extra,
            'availability' => $this->availability,
            'loyaltyPoints' => $this->loyaltyPoints,
            'cartItemServices' => $this->cartItemServices,
        ];
    }
}
