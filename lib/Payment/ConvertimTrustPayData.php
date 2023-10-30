<?php

namespace Convertim\Payment;

class ConvertimTrustPayData implements \JsonSerializable
{
    /**
     * @var string
     */
    private $defaultPaymentInstruction;

    /**
     * @param string $defaultPaymentInstruction
     */
    public function __construct($defaultPaymentInstruction)
    {
        $this->defaultPaymentInstruction = $defaultPaymentInstruction;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'defaultPaymentInstruction' => $this->defaultPaymentInstruction,
        ];
    }
}
