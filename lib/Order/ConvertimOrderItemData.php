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
     * @var string
     */
    private $vatRate;

    /**
     * @param string $productId
     * @param string $productName
     * @param float|int|string $quantity
     * @param string $priceWithoutVat
     * @param string $priceWithVat
     * @param string $vatRate
     */
    public function __construct(
        $productId,
        $productName,
        $quantity,
        $priceWithoutVat,
        $priceWithVat,
        $vatRate
    ) {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->quantity = $quantity;
        $this->priceWithoutVat = $priceWithoutVat;
        $this->priceWithVat = $priceWithVat;
        $this->vatRate = $vatRate;
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
}
