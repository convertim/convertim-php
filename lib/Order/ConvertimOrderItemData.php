<?php

namespace Convertim\Order;

class ConvertimOrderItemData
{
    /**
     * @var string
     */
    private $productId;

    /**
     * @var string
     */
    private $productName;

    /**
     * @var int|float|string
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
     * @var string|null
     */
    private $loyaltyPoints;

    /**
     * @var \Convertim\Order\ConvertimOrderItemServiceData[]
     */
    private $cartItemServices;

    /**
     * @var string
     */
    private $vatRate;

    /**
     * @var array
     */
    private $extra;

    /**
     * @var array
     */
    private $discounts;

    /**
     * @param string $productId
     * @param string $productName
     * @param float|int|string $quantity
     * @param string $priceWithoutVat
     * @param string $priceWithVat
     * @param string $vatRate
     * @param array $extra
     * @param string|null $loyaltyPoints
     * @param \Convertim\Order\ConvertimOrderItemServiceData[] $cartItemServices
     * @param array $discounts
     */
    public function __construct(
        $productId,
        $productName,
        $quantity,
        $priceWithoutVat,
        $priceWithVat,
        $vatRate,
        $extra,
        $loyaltyPoints = null,
        $cartItemServices = [],
        $discounts = []
    ) {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->quantity = $quantity;
        $this->priceWithoutVat = $priceWithoutVat;
        $this->priceWithVat = $priceWithVat;
        $this->vatRate = $vatRate;
        $this->extra = $extra;
        $this->loyaltyPoints = $loyaltyPoints;
        $this->cartItemServices = $cartItemServices;
        $this->discounts = $discounts;
    }

    /**
     * @return string
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @return int|float|string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getPriceWithoutVat()
    {
        return $this->priceWithoutVat;
    }

    /**
     * @return string
     */
    public function getPriceWithVat()
    {
        return $this->priceWithVat;
    }

    /**
     * @return string
     */
    public function getVatRate()
    {
        return $this->vatRate;
    }

    /**
     * @return array
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @return string|null
     */
    public function getLoyaltyPoints()
    {
        return $this->loyaltyPoints;
    }

    /**
     * @return \Convertim\Order\ConvertimOrderItemServiceData[]
     */
    public function getCartItemServices()
    {
        return $this->cartItemServices;
    }

    /**
     * @return array
     */
    public function getDiscounts(): array
    {
        return $this->discounts;
    }
}
