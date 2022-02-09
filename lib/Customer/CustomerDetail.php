<?php

namespace Convertim\Customer;

class CustomerDetail implements \JsonSerializable
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $telephoneNumber;

    /**
     * @var \Convertim\Customer\DeliveryAddress|null
     */
    private $deliveryAddress;

    /**
     * @var \Convertim\Customer\BillingAddress|null
     */
    private $billingAddress;

    /**
     * @var string|null
     */
    private $lastSelectedPaymentUuid;

    /**
     * @var string|null
     */
    private $lastSelectedTransportUuid;

    /**
     * @param string $email
     * @param string $telephoneNumber
     * @param \Convertim\Customer\DeliveryAddress|null $deliveryAddress
     * @param \Convertim\Customer\BillingAddress|null  $billingAddress
     * @param string|null $lastSelectedPaymentUuid
     * @param string|null $lastSelectedTransportUuid
     */
    public function __construct(
        $email,
        $telephoneNumber,
        $deliveryAddress = null,
        $billingAddress = null,
        $lastSelectedPaymentUuid = null,
        $lastSelectedTransportUuid = null
    ) {
        $this->email = $email;
        $this->telephoneNumber = $telephoneNumber;
        $this->deliveryAddress = $deliveryAddress;
        $this->billingAddress = $billingAddress;
        $this->lastSelectedPaymentUuid = $lastSelectedPaymentUuid;
        $this->lastSelectedTransportUuid = $lastSelectedTransportUuid;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'email' => $this->email,
            'telephoneNumber' => $this->telephoneNumber,
            'deliveryAddress' => $this->deliveryAddress,
            'billingAddress' => $this->billingAddress,
            'lastSelectedPaymentUuid' => $this->lastSelectedPaymentUuid,
            'lastSelectedTransportUuid' => $this->lastSelectedTransportUuid,
        ];
    }
}
