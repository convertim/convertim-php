<?php

namespace Convertim\Order;

class ConvertimOrderGoPayData
{
    /**
     * @var int
     */
    private $amount;

    /**
     * @var string
     */
    private $orderNumber;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $state;

    /**
     * @param int $amount
     * @param string $orderNumber
     * @param string $currency
     * @param int $id
     * @param string $state
     */
    public function __construct(
        $amount,
        $orderNumber,
        $currency,
        $id,
        $state
    ) {
        $this->amount = $amount;
        $this->orderNumber = $orderNumber;
        $this->currency = $currency;
        $this->id = $id;
        $this->state = $state;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
}
