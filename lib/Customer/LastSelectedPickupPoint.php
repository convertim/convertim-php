<?php

namespace Convertim\Customer;

class LastSelectedPickupPoint implements \JsonSerializable
{

    /**
     * @var string
     */
    private $source;

    /**
     * @var string
     */
    private $code;

    /**
     * @param string $source
     * @param string $code
     */
    public function __construct($source, $code)
    {
        $this->source = $source;
        $this->code = $code;
    }

    #[\ReturnTypeWillChange]
    function jsonSerialize()
    {
        return [
            'source' => $this->source,
            'code' => $this->code,
        ];
    }
}
