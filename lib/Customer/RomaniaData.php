<?php

namespace Convertim\Customer;

class RomaniaData implements \JsonSerializable
{

    /**
     * @var string|null
     */
    private $judet;

    /**
     * @var string|null
     */
    private $orase;

    /**
     * @param string|null $judet
     * @param string|null $orase
     */
    public function __construct($judet, $orase)
    {
        $this->judet = $judet;
        $this->orase = $orase;
    }

    /**
     * @return string|null
     */
    public function getJudet()
    {
        return $this->judet;
    }

    /**
     * @return string|null
     */
    public function getOrase()
    {
        return $this->orase;
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        return [
            'judet' => $this->judet,
            'orase' => $this->orase,
        ];
    }
}
