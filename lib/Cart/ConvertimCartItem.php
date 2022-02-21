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
     * @var \Convertim\Cart\ConvertimCartItemDiscount
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
     * @param string $id
     * @param string $name
     * @param float|int|string $quantity
     * @param string $priceWithoutVat
     * @param string $priceWithVat
     * @param string $vat
     * @param string $image
     * @param string[] $gtm
     * @param \Convertim\Cart\ConvertimCartItemDiscount[] $discounts
     * @param \Convertim\Cart\ConvertimCartItemAdditional[] $additional
     * @param string[] $labels
     */
    public function __construct($id, $name, $quantity, $priceWithoutVat, $priceWithVat, $vat, $image, $gtm = [], $discounts = [], $additional = [], $labels = [])
    {
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
            'discounts' => array_reduce(
                $this->discounts,
                function ($transformedDiscount, $item) {
                    $transformedDiscount[$item->getCode()] = $item->getDiscount();

                    return $transformedDiscount;
                },
                []
            ),
            'additional' => $this->additional,
            'labels' => $this->labels,
        ];
    }
}
