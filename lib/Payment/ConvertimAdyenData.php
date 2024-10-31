<?php

namespace Convertim\Payment;

class ConvertimAdyenData implements \JsonSerializable
{
    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $environment;

    /**
     * @var string
     */
    private $clientKey;

    /**
     * @param string $method
     * @param string $environment
     * @param string $clientKey
     */
    public function __construct($method, $environment, $clientKey)
    {
        $this->method = $method;
        $this->environment = $environment;
        $this->clientKey = $clientKey;
    }

    /**
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'method' => $this->method,
            'environment' => $this->environment,
            'clientKey' => $this->clientKey,
        ];
    }
}
