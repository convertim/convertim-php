<?php

namespace Convertim\Order;

class ConvertimOrderTransportData
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $source;

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
     * @var \Convertim\Order\ConvertimOrderTransportExtraData|null
     */
    private $extra;

    /**
     * @var \Convertim\Order\ConvertimOrderTransportServiceData[]
     */
    private $services;

    /**
     * @param string $uuid
     * @param string $priceWithoutVat
     * @param string $priceWithVat
     * @param string $vatRate
     * @param null $source
     * @param string|null $type
     * @param \Convertim\Order\ConvertimOrderTransportExtraData|null $extra
     * @param \Convertim\Order\ConvertimOrderTransportServiceData[] $services
     */
    public function __construct(
        $uuid,
        $priceWithoutVat,
        $priceWithVat,
        $vatRate,
        $source = null,
        $type = null,
        $extra = null,
        $services = []
    ) {
        $this->uuid = $uuid;
        $this->type = $type;
        $this->source = $source;
        $this->priceWithoutVat = $priceWithoutVat;
        $this->priceWithVat = $priceWithVat;
        $this->vatRate = $vatRate;
        $this->extra = $extra;
        $this->services = $services;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getSource()
    {
        return $this->source;
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
     * @return \Convertim\Order\ConvertimOrderTransportExtraData|null
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @return \Convertim\Order\ConvertimOrderTransportServiceData[]
     */
    public function getServices()
    {
        return $this->services;
    }
}
