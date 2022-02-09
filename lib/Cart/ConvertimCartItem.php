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
     * @var array
     */
    private $gtm;

    /**
     * @var \Convertim\Cart\ConvertimCartItemDiscount
     */
    private $discounts;

    /**
     * @param string $id
     * @param string $name
     * @param float|int|string $quantity
     * @param string $priceWithoutVat
     * @param string $priceWithVat
     * @param string $vat
     * @param string $image
     * @param array $gtm
     * @param \Convertim\Cart\ConvertimCartItemDiscount[] $discounts
     */
    public function __construct($id, $name, $quantity, $priceWithoutVat, $priceWithVat, $vat, $image, $gtm = [], $discounts = [])
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
        ];
    }
}
