<?php

namespace Convertim\Order;

class ConvertimOrderDataPaymentStatus
{
    /**
     * @var string
     */
    private $paymentProvider;

    /**
     * @var string
     */
    private $paymentProviderId;

    /**
     * @var string
     */
    private $status;

    /**
     * @var bool
     */
    private $isPaid;

    /**
     * @param string $paymentProvider
     * @param string $paymentProviderId
     * @param string $status
     * @param bool $isPaid
     */
    public function __construct($paymentProvider, $paymentProviderId, $status, $isPaid)
    {
        $this->paymentProvider = $paymentProvider;
        $this->paymentProviderId = $paymentProviderId;
        $this->status = $status;
        $this->isPaid = $isPaid;
    }

    /**
     * @return string
     */
    public function getPaymentProvider()
    {
        return $this->paymentProvider;
    }

    /**
     * @return string
     */
    public function getPaymentProviderId()
    {
        return $this->paymentProviderId;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function isPaid()
    {
        return $this->isPaid;
    }
}
