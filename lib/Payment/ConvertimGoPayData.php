<?php

namespace Convertim\Payment;

class ConvertimGoPayData implements \JsonSerializable
{
    /**
     * @var string
     */
    private $defaultPaymentInstruction;

    /**
     * @var string[]
     */
    private $allowedPaymentInstruments;

    /**
     * @param string $defaultPaymentInstruction
     * @param string[] $allowedPaymentInstruments
     */
    public function __construct($defaultPaymentInstruction, $allowedPaymentInstruments = [])
    {
        $this->defaultPaymentInstruction = $defaultPaymentInstruction;
        $this->allowedPaymentInstruments = $allowedPaymentInstruments;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'defaultPaymentInstruction' => $this->defaultPaymentInstruction,
            'allowedPaymentInstruments' => $this->allowedPaymentInstruments,
        ];
    }
}
