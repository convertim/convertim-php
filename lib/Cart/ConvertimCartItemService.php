<?php

namespace Convertim\Cart;

class ConvertimCartItemService implements \JsonSerializable
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


    function jsonSerialize()
    {
        return [
            'serviceId' => $this->serviceId,
            'serviceName' => $this->serviceName,
            'priceWithoutVat' => $this->priceWithoutVat,
            'priceWithVat' => $this->priceWithVat,
            'loyaltyPoints' => $this->loyaltyPoints,
        ];
    }
}
