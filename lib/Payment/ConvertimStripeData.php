<?php

namespace Convertim\Payment;

class ConvertimStripeData implements \JsonSerializable
{
    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $clientKey;

    /**
     * @param string $method
     * @param string $clientKey
     */
    public function __construct($method, $clientKey)
    {
        $this->method = $method;
        $this->clientKey = $clientKey;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'method' => $this->method,
            'clientKey' => $this->clientKey,
        ];
    }
}
