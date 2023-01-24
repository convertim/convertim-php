<?php

namespace Convertim\Order;

class ConvertimOrderData
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * @var \Convertim\Order\ConvertimCustomerData
     */
    private $customerData;

    /**
     * @var \Convertim\Order\ConvertimOrderItemData[]
     */
    private $orderItemsData;

    /**
     * @var \Convertim\Order\ConvertimOrderTransportData
     */
    private $transportData;

    /**
     * @var \Convertim\Order\ConvertimOrderPaymentData
     */
    private $paymentData;

    /**
     * @var \Convertim\Order\ConvertimOrderPromoCodesData[]
     */
    private $promoCodes;

    /**
     * @var \Convertim\Order\ConvertimOrderGoPayData|null
     */
    private $goPayData;

    /**
     * @var \Convertim\Order\ConvertimOrderAdyenData|null
     */
    private $adyenData;

    /**
     * @var string|null
     */
    private $note;

    /**
     * @var bool
     */
    private $disallowHeurekaVerifiedByCustomers;

    /**
     * @var bool
     */
    private $registerToNewsletter;

    /**
     * @var bool
     */
    private $registerToEshop;

    /**
     * @var array
     */
    private $cartExtraData;

    /**
     * @var \Convertim\Order\ConvertimOrderPaypalData|null
     */
    private $paypalData;

    /**
     * @var array[]
     */
    private $browserInfo;

    /**
     * @param string $uuid
     * @param string|null $note
     * @param bool $disallowHeurekaVerifiedByCustomers
     * @param \Convertim\Order\ConvertimCustomerData $customerData
     * @param \Convertim\Order\ConvertimOrderTransportData $transportData
     * @param \Convertim\Order\ConvertimOrderPaymentData $paymentData
     * @param \Convertim\Order\ConvertimOrderItemData[] $orderItemsData
     * @param \Convertim\Order\ConvertimOrderPromoCodesData[] $promoCodes
     * @param \Convertim\Order\ConvertimOrderGoPayData|null $goPayData
     * @param \Convertim\Order\ConvertimOrderAdyenData|null $adyenData
     * @param bool $registerToNewsletter
     * @param bool $registerToEshop
     * @param array $cartExtraData
     * @param \Convertim\Order\ConvertimOrderPaypalData|null $paypalData
     * @param array $browserInfo
     */
    public function __construct(
        $uuid,
        $note,
        $disallowHeurekaVerifiedByCustomers,
        $customerData,
        $transportData,
        $paymentData,
        $orderItemsData,
        $promoCodes,
        $goPayData = null,
        $adyenData = null,
        $registerToNewsletter = false,
        $registerToEshop = false,
        $cartExtraData = [],
        $paypalData = null,
        $browserInfo = []
    ) {
        $this->uuid = $uuid;
        $this->note = $note;
        $this->disallowHeurekaVerifiedByCustomers = $disallowHeurekaVerifiedByCustomers;
        $this->customerData = $customerData;
        $this->orderItemsData = $orderItemsData;
        $this->transportData = $transportData;
        $this->paymentData = $paymentData;
        $this->promoCodes = $promoCodes;
        $this->goPayData = $goPayData;
        $this->adyenData = $adyenData;
        $this->registerToNewsletter = $registerToNewsletter;
        $this->registerToEshop = $registerToEshop;
        $this->cartExtraData = $cartExtraData;
        $this->paypalData = $paypalData;
        $this->browserInfo = $browserInfo;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return \Convertim\Order\ConvertimCustomerData
     */
    public function getCustomerData()
    {
        return $this->customerData;
    }

    /**
     * @return \Convertim\Order\ConvertimOrderItemData[]
     */
    public function getOrderItemsData()
    {
        return $this->orderItemsData;
    }

    /**
     * @return \Convertim\Order\ConvertimOrderTransportData
     */
    public function getTransportData()
    {
        return $this->transportData;
    }

    /**
     * @return \Convertim\Order\ConvertimOrderPaymentData
     */
    public function getPaymentData()
    {
        return $this->paymentData;
    }

    /**
     * @return \Convertim\Order\ConvertimOrderPromoCodesData[]
     */
    public function getPromoCodes()
    {
        return $this->promoCodes;
    }

    /**
     * @return \Convertim\Order\ConvertimOrderGoPayData|null
     */
    public function getGoPayData()
    {
        return $this->goPayData;
    }

    /**
     * @return \Convertim\Order\ConvertimOrderAdyenData|null
     */
    public function getAdyenData()
    {
        return $this->adyenData;
    }

    /**
     * @return string|null
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @return bool
     */
    public function isBillingAddressSameAsDeliveryAddress()
    {
        return $this->getCustomerData()->getConvertimCustomerBillingAddressData() === null;
    }

    /**
     * @return bool
     */
    public function isDisallowHeurekaVerifiedByCustomers()
    {
        return $this->disallowHeurekaVerifiedByCustomers;
    }

    /**
     * @return bool
     */
    public function isRegisterToNewsletter()
    {
        return $this->registerToNewsletter;
    }

    /**
     * @return bool
     */
    public function isRegisterToEshop()
    {
        return $this->registerToEshop;
    }

    /**
     * @return array
     */
    public function getCartExtraData()
    {
        return $this->cartExtraData;
    }

    /**
     * @return \Convertim\Order\ConvertimOrderPaypalData|null
     */
    public function getPaypalData()
    {
        return $this->paypalData;
    }

    /**
     * @return array[]
     */
    public function getBrowserInfo()
    {
        return $this->browserInfo;
    }
}
