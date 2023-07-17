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
    private $pickupPointName;

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
     * @param string|null $pickUpPointCode
     * @param string|null $pickupPointName
     * @param string|null $pickupPointStreet
     * @param string|null $pickupPointCity
     * @param string|null $pickupPointPostCode
     * @param string|null $pickupPointCountryCode
     * @param string|null $transportCurrency
     */
    public function __construct(
        $pickUpPointCode,
        $pickupPointName,
        $pickupPointStreet,
        $pickupPointCity,
        $pickupPointPostCode,
        $pickupPointCountryCode,
        $transportCurrency = null
    ) {
        $this->pickUpPointCode = $pickUpPointCode;
        $this->pickupPointName = $pickupPointName;
        $this->pickupPointStreet = $pickupPointStreet;
        $this->pickupPointCity = $pickupPointCity;
        $this->pickupPointPostCode = $pickupPointPostCode;
        $this->pickupPointCountryCode = $pickupPointCountryCode;
        $this->transportCurrency = $transportCurrency;
    }

    /**
     * @return string|null
     */
    public function getPickUpPointCode()
    {
        return $this->pickUpPointCode;
    }

    /**
     * @return string|null
     */
    public function getPickupPointName()
    {
        return $this->pickupPointName;
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
}
