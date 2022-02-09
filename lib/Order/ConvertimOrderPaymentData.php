<?php

namespace Convertim\Order;

class ConvertimOrderPaymentData
{
    const CONVERTIM_PAYMENT_TYPE_CASH_ON_DELIVERY = 'cash_on_delivery';

    const CONVERTIM_PAYMENT_TYPE_GOPAY = 'gopay';

    const CONVERTIM_PAYMENT_TYPE_ADYEN = 'adyen';

    /**
     * @var string
     */
    private $uuid;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $priceWithVat;

    /**
     * @var string
     */
    private $priceWithoutVat;

    /**
     * @var string
     */
    private $vatRate;

    /**
     * @param string $uuid
     * @param string $type
     * @param string $priceWithoutVat
     * @param string $priceWithVat
     * @param string $vatRate
     */
    public function __construct(
        $uuid,
        $type,
        $priceWithoutVat,
        $priceWithVat,
        $vatRate
    ) {
        $this->uuid = $uuid;
        $this->type = $type;
        $this->priceWithoutVat = $priceWithoutVat;
        $this->priceWithVat = $priceWithVat;
        $this->vatRate = $vatRate;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
    public function getPriceWithoutVat()
    {
        return $this->priceWithoutVat;
    }

    /**
     * @return string
     */
    public function getVatRate()
    {
        return $this->vatRate;
    }
}
