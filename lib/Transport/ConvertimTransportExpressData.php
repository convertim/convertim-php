<?php

namespace Convertim\Transport;

class ConvertimTransportExpressData implements \JsonSerializable
{
    /**
     * @var string
     */
    private $validZips;

    /**
     * @param string $validZips
     */
    public function __construct($validZips)
    {
        $this->validZips = $validZips;
    }

    function jsonSerialize()
    {
        return [
            'validZips' => $this->validZips,
        ];
    }
}
