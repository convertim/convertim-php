<?php

namespace Convertim\Transport;

class ConvertimTransport implements \JsonSerializable
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $isShortForm;

    /**
     * @var string|null
     */
    private $transportDescription;

    /**
     * @var string|null
     */
    private $group;

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
    private $priceWithVat;

    /**
     * @var string
     */
    private $priceWithoutVat;

    /**
     * @var string
     */
    private $vat;

    /**
     * @var string[]
     */
    private $services;

    /**
     * @var string
     */
    private $image;

    /**
     * @var string|null
     */
    private $transportInstruction;

    /**
     * @var string|null
     */
    private $readableDeliveryTime;

    /**
     * @var bool
     */
    private $exceedLimit;

    /**
     * @var \Convertim\Transport\ConvertimTransportExpressData
     */
    private $convertimTransportExpressData;

    /**
     * @var string|null
     */
    private $groupDescription;

    /**
     * @var string|null
     */
    private $calculatedDeliveryTime;

    /**
     * @var string|null
     */
    private $label;

    /**
     * @var string|null
     */
    private $pickupPointType;

    /**
     * @param string $uuid
     * @param string $name
     * @param bool $isShortForm
     * @param string|null $type
     * @param string $priceWithVat
     * @param string $priceWithoutVat
     * @param string $vat
     * @param string|null $image
     * @param string|null $transportDescription
     * @param string|null $source
     * @param string|null $group
     * @param string[] $services
     * @param string|null $transportInstruction
     * @param string|null $readableDeliveryTime
     * @param bool $exceedLimit
     * @param \Convertim\Transport\ConvertimTransportExpressData $convertimTransportExpressData
     * @param string|null $groupDescription
     * @param string|null $calculatedDeliveryTime
     * @param string|null $label
     * @param string|null $pickupPointType
     */
    public function __construct(
        $uuid,
        $name,
        $isShortForm,
        $type,
        $priceWithVat,
        $priceWithoutVat,
        $vat,
        $image = null,
        $transportDescription = null,
        $source = null,
        $group = null,
        $services = [],
        $transportInstruction = null,
        $readableDeliveryTime = null,
        $exceedLimit = false,
        $convertimTransportExpressData = null,
        $groupDescription = null,
        $calculatedDeliveryTime = null,
        $label = null,
        $pickupPointType = null
    ) {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->isShortForm = $isShortForm;
        $this->type = $type;
        $this->priceWithVat = $priceWithVat;
        $this->priceWithoutVat = $priceWithoutVat;
        $this->vat = $vat;
        $this->image = $image;
        $this->transportDescription = $transportDescription;
        $this->source = $source;
        $this->group = $group;
        $this->services = $services;
        $this->transportInstruction = $transportInstruction;
        $this->readableDeliveryTime = $readableDeliveryTime;
        $this->exceedLimit = $exceedLimit;
        $this->convertimTransportExpressData = $convertimTransportExpressData;
        $this->groupDescription = $groupDescription;
        $this->calculatedDeliveryTime = $calculatedDeliveryTime;
        $this->label = $label;
        $this->pickupPointType = $pickupPointType;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'isShortForm' => $this->isShortForm,
            'type' => $this->type,
            'image' => $this->image,
            'priceWithVat' => $this->priceWithVat,
            'priceWithoutVat' => $this->priceWithoutVat,
            'vat' => $this->vat,
            'transportDescription' => $this->transportDescription,
            'source' => $this->source,
            'group' => $this->group,
            'services' => $this->services,
            'transportInstruction' => $this->transportInstruction,
            'deliveryTime' => $this->readableDeliveryTime,
            'exceedLimit' => $this->exceedLimit,
            'convertimTransportExpressData' => $this->convertimTransportExpressData,
            'groupDescription' => $this->groupDescription,
            'calculatedDeliveryTime' => $this->calculatedDeliveryTime,
            'label' => $this->label,
            'pickupPointType' => $this->pickupPointType,
        ];
    }
}
