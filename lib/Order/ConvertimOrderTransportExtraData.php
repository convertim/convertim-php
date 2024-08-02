<?php

namespace Convertim\Order;

class ConvertimOrderTransportExtraData
{
    /**
     * @var string|null
     */
    private $pickUpPointCode;

    /**
     * @var string|null
     */
    private $pickupPointCompanyName;

    /**
     * @var string|null
     */
    private $pickupPointStreet;

    /**
     * @var string|null
     */
    private $pickupPointCity;

    /**
     * @var string|null
     */
    private $pickupPointPostCode;

    /**
     * @var string|null
     */
    private $pickupPointCountryCode;

    /**
     * @var string|null
     */
    private $transportCurrency;

    /**
     * @var string|int|null
     */
    private $carrierId;

    /**
     * @var string|null
     */
    private $pickupPointPointName;

    /**
     * @param string|null $pickUpPointCode
     * @param string|null $pickupPointCompanyName
     * @param string|null $pickupPointStreet
     * @param string|null $pickupPointCity
     * @param string|null $pickupPointPostCode
     * @param string|null $pickupPointCountryCode
     * @param string|null $transportCurrency
     * @param string|int|null $carrierId
     * @param string|null $pickupPointPointName
     */
    public function __construct(
        $pickUpPointCode,
        $pickupPointCompanyName,
        $pickupPointStreet,
        $pickupPointCity,
        $pickupPointPostCode,
        $pickupPointCountryCode,
        $transportCurrency = null,
        $carrierId = null,
        $pickupPointPointName = null
    ) {
        $this->pickUpPointCode = $pickUpPointCode;
        $this->pickupPointCompanyName = $pickupPointCompanyName;
        $this->pickupPointStreet = $pickupPointStreet;
        $this->pickupPointCity = $pickupPointCity;
        $this->pickupPointPostCode = $pickupPointPostCode;
        $this->pickupPointCountryCode = $pickupPointCountryCode;
        $this->transportCurrency = $transportCurrency;
        $this->carrierId = $carrierId;
        $this->pickupPointPointName = $pickupPointPointName;
    }

    /**
     * @return string|null
     */
    public function getPickUpPointCode()
    {
        return $this->pickUpPointCode;
    }

    /**
     * @deprecated - use getPickupPointCompanyName
     * @return string|null
     */
    public function getPickupPointName()
    {
        return $this->pickupPointCompanyName;
    }

    public function getPickupPointCompanyName()
    {
        return $this->pickupPointCompanyName;
    }

    /**
     * @return string|null
     */
    public function getPickupPointStreet()
    {
        return $this->pickupPointStreet;
    }

    /**
     * @return string|null
     */
    public function getPickupPointCity()
    {
        return $this->pickupPointCity;
    }

    /**
     * @return string|null
     */
    public function getPickupPointPostCode()
    {
        return $this->pickupPointPostCode;
    }

    /**
     * @return string|null
     */
    public function getPickupPointCountryCode()
    {
        return $this->pickupPointCountryCode;
    }

    /**
     * @return string|null
     */
    public function getTransportCurrency()
    {
        return $this->transportCurrency;
    }

    /**
     * @return int|string|null
     */
    public function getCarrierId()
    {
        return $this->carrierId;
    }

    /**
     * @return string|null
     */
    public function getPickupPointPointName(): ?string
    {
        return $this->pickupPointPointName;
    }
}
