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
     * @var string|null
     */
    private $bankSwift;

    /**
     * @param string $defaultPaymentInstruction
     * @param string[] $allowedPaymentInstruments
     * @param string|null $bankSwift
     */
    public function __construct($defaultPaymentInstruction, $allowedPaymentInstruments = [], $bankSwift = null)
    {
        $this->defaultPaymentInstruction = $defaultPaymentInstruction;
        $this->allowedPaymentInstruments = $allowedPaymentInstruments;
        $this->bankSwift = $bankSwift;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'defaultPaymentInstruction' => $this->defaultPaymentInstruction,
            'allowedPaymentInstruments' => $this->allowedPaymentInstruments,
            'bankSwift' => $this->bankSwift,
        ];
    }
}
