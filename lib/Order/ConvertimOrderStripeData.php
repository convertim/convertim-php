<?php

namespace Convertim\Order;

class ConvertimOrderStripeData
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $prevPrice;

    /**
     * @var string
     */
    private $clientSecret;

    /**
     * @var string
     */
    private $status;

    /**
     * @param string $id
     */
    public function __construct($id, $prevPrice, $clientSecret, $status)
    {
        $this->id = $id;
        $this->prevPrice = $prevPrice;
        $this->clientSecret = $clientSecret;
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPrevPrice()
    {
        return $this->prevPrice;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->clientSecret;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
