<?php

namespace Convertim\Order;

class ConvertimOrderTrustPayData
{
    /**
     * @var int
     */
    private $paymentRequestId;

    /**
     * @var string
     */
    private $state;

    /**
     * @var object
     */
    private $resultInfo;

    /**
     * @param int $paymentRequestId
     * @param string $state
     * @param object $resultInfo
     */
    public function __construct($paymentRequestId, $state, $resultInfo)
    {
        $this->paymentRequestId = $paymentRequestId;
        $this->state = $state;
        $this->resultInfo = $resultInfo;
    }

    /**
     * @return int
     */
    public function getPaymentRequestId()
    {
        return $this->paymentRequestId;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return object
     */
    public function getResultInfo()
    {
        return $this->resultInfo;
    }
}
