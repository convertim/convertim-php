<?php

namespace Convertim\Transport;

class ConvertimTransportExpressData implements \JsonSerializable
{
    /**
     * @var string
     */
    private $validZips;

    /**
     * @var string
     */
    private $validZipsCities;

    /**
     * @param string $validZips
     * @param string $validZipsCities
     */
    public function __construct($validZips, $validZipsCities)
    {
        $this->validZips = $validZips;
        $this->validZipsCities = $validZipsCities;
    }

    #[\ReturnTypeWillChange]
    function jsonSerialize()
    {
        return [
            'validZips' => $this->validZips,
            'validZipsCities' => $this->validZipsCities,
        ];
    }
}
