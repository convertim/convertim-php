<?php

namespace Convertim\Order;

class ConvertimCustomerData
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $telephonePrefix;

    /**
     * @var string
     */
    private $telephoneNumber;

    /**
     * @var \Convertim\Order\ConvertimCustomerDeliveryAddressData
     */
    private $convertimCustomerDeliveryAddressData;

    /**
     * @var \Convertim\Order\ConvertimCustomerBillingAddressData|null
     */
    private $convertimCustomerBillingAddressData;

    /**
     * @var string|null
     */
    private $customerEshopUuid;

    /**
     * @var boolean
     */
    private $buyForCompany;

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $telephonePrefix
     * @param string $telephoneNumber
     * @param \Convertim\Order\ConvertimCustomerDeliveryAddressData $convertimCustomerDeliveryAddressData
     * @param \Convertim\Order\ConvertimCustomerBillingAddressData|null $convertimCustomerBillingAddressData
     * @param string|null $customerEshopUuid
     * @param boolean $buyForCompany
     */
    public function __construct(
        $firstName,
        $lastName,
        $email,
        $telephonePrefix,
        $telephoneNumber,
        $convertimCustomerDeliveryAddressData,
        $convertimCustomerBillingAddressData = null,
        $customerEshopUuid = null,
        $buyForCompany = false
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->telephonePrefix = $telephonePrefix;
        $this->telephoneNumber = $telephoneNumber;
        $this->convertimCustomerDeliveryAddressData = $convertimCustomerDeliveryAddressData;
        $this->convertimCustomerBillingAddressData = $convertimCustomerBillingAddressData;
        $this->customerEshopUuid = $customerEshopUuid;
        $this->buyForCompany = $buyForCompany;
    }

    /**
     * @return string|null
     */
    public function getCustomerEshopUuid()
    {
        return $this->customerEshopUuid;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getTelephonePrefix()
    {
        return $this->telephonePrefix;
    }

    /**
     * @return string
     */
    public function getTelephoneNumber()
    {
        return $this->telephoneNumber;
    }

    /**
     * @return string
     */
    public function getTelephoneNumberWithPrefix()
    {
        return $this->getTelephonePrefix() . $this->getTelephoneNumber();
    }

    /**
     * @return \Convertim\Order\ConvertimCustomerDeliveryAddressData
     */
    public function getConvertimCustomerDeliveryAddressData()
    {
        return $this->convertimCustomerDeliveryAddressData;
    }

    /**
     * @return \Convertim\Order\ConvertimCustomerBillingAddressData|null
     */
    public function getConvertimCustomerBillingAddressData()
    {
        return $this->convertimCustomerBillingAddressData;
    }

    /**
     * @return bool
     */
    public function isBuyForCompany()
    {
        return $this->buyForCompany;
    }
}
