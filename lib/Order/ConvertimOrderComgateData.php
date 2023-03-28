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
     * @var string|null
     */
    public $fik;

    /**
     * @var string|null
     */
    public $bkp;

    /**
     * @var string|null
     */
    public $pkp;

    /**
     * @param string $transactionId
     * @param \DateTime $createdAt
     * @param string $status
     * @param string|null $fik
     * @param string|null $bkp
     * @param string|null $pkp
     */
    public function __construct($transactionId, $createdAt, $status, $fik = null, $bkp = null, $pkp = null)
    {
        $this->transactionId = $transactionId;
        $this->createdAt = $createdAt;
        $this->status = $status;
        $this->fik = $fik;
        $this->bkp = $bkp;
        $this->pkp = $pkp;
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
     * @return string|null
     */
    public function getFik()
    {
        return $this->fik;
    }

    /**
     * @return string|null
     */
    public function getBkp()
    {
        return $this->bkp;
    }

    /**
     * @return string|null
     */
    public function getPkp()
    {
        return $this->pkp;
    }
}
