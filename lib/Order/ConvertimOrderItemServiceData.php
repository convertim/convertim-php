<?php

namespace Convertim\Order;

class ConvertimOrderItemServiceData
{
    /**
     * @var string
     */
    private $serviceId;

    /**
     * @var string
     */
    private $serviceName;

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
     * @param string $serviceId
     * @param string $serviceName
     * @param string $priceWithoutVat
     * @param string $priceWithVat
     * @param string|null $loyaltyPoints
     */
    public function __construct($serviceId, $serviceName, $priceWithoutVat, $priceWithVat, $loyaltyPoints)
    {
        $this->serviceId = $serviceId;
        $this->serviceName = $serviceName;
        $this->priceWithoutVat = $priceWithoutVat;
        $this->priceWithVat = $priceWithVat;
        $this->loyaltyPoints = $loyaltyPoints;
    }

    /**
     * @return string
     */
    public function getServiceId(): string
    {
        return $this->serviceId;
    }

    /**
     * @return string
     */
    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    /**
     * @return string
     */
    public function getPriceWithoutVat(): string
    {
        return $this->priceWithoutVat;
    }

    /**
     * @return string
     */
    public function getPriceWithVat(): string
    {
        return $this->priceWithVat;
    }

    /**
     * @return string|null
     */
    public function getLoyaltyPoints(): ?string
    {
        return $this->loyaltyPoints;
    }
}
