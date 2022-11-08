<?php

namespace Convertim\Order;

class ConvertimOrderPaypalData
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $cart;

    /**
     * @param int $id
     * @param string $state
     * @param $cart
     */
    public function __construct(
        $id,
        $state,
        $cart
    ) {
        $this->id = $id;
        $this->state = $state;
        $this->cart = $cart;
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
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getCart()
    {
        return $this->cart;
    }
}
