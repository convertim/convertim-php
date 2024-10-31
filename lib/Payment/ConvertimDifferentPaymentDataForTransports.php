<?php

namespace Convertim\Payment;

class ConvertimDifferentPaymentDataForTransports implements \JsonSerializable
{
    /**
     * @var string
     */
    private $transportUuid;

    /**
     * @var string
     */
    private $priceWithVat;

    /**
     * @var string|null
     */
    private $priceWithoutVat;

    /**
     * @var string|null
     */
    private $vat;

    /**
     * @param string $transportUuid
     * @param string $priceWithVat
     * @param string|null $priceWithoutVat
     * @param string|null $vat
     */
    public function __construct($transportUuid, $priceWithVat, $priceWithoutVat, $vat)
    {
        $this->transportUuid = $transportUuid;
        $this->priceWithVat = $priceWithVat;
        $this->priceWithoutVat = $priceWithoutVat;
        $this->vat = $vat;
    }

    #[\ReturnTypeWillChange]
    function jsonSerialize()
    {
        return [
            'transportUuid' => $this->transportUuid,
            'priceWithVat' => $this->priceWithVat,
            'priceWithoutVat' => $this->priceWithoutVat,
            'vat' => $this->vat,
        ];
    }
}
