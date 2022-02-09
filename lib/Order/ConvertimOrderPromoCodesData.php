<?php

namespace Convertim\Order;

class ConvertimOrderPromoCodesData
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * @var string
     */
    private $code;

    /**
     * @param string $uuid
     * @param string $code
     */
    public function __construct($uuid, $code)
    {
        $this->uuid = $uuid;
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}
