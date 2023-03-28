<?php

namespace Convertim\Order;

class ConvertimOrderComgateData
{
    /**
     * @var string
     */
    public $transactionId;

    /**
     * @var \DateTime
     */
    public $createdAt;

    /**
     * @var string
     */
    public $status;

    /**
     * @var object|null
     */
    public $other;

    /**
     * @param string $transactionId
     * @param string $status
     * @param object|null $other
     */
    public function __construct($transactionId, $status, $other = null)
    {
        $this->transactionId = $transactionId;
        $this->status = $status;
        $this->other = $other;
    }

    /**
     * @return string
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return object|null
     */
    public function getOther()
    {
        return $this->other;
    }
}
