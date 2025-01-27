<?php

namespace Convertim\Payment;

class ConvertimPayment implements \JsonSerializable
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $priceWithVat;

    /**
     * @var string
     */
    private $priceWithoutVat;

    /**
     * @var string
     */
    private $vat;

    /**
     * @var string|null
     */
    private $image;

    /**
     * @var \Convertim\Payment\ConvertimGoPayData|null
     */
    private $gopay;

    /**
     * @var \Convertim\Payment\ConvertimAdyenData|null
     */
    private $adyen;

    /**
     * @var string|null
     */
    private $paymentDescription;

    /**
     * @var string[]
     */
    private $restrictedTransports;

    /**
     * @var string|null
     */
    private $paymentInstruction;

    /**
     * @var \Convertim\Payment\ConvertimStripeData|null
     */
    private $stripe;


    /**
     * @var \Convertim\Payment\ConvertimComgateData|null
     */
    private $comgate;

    /**
     * @var \Convertim\Payment\ConvertimTrustPayData|null
     */
    private $trustPay;

    /**
     * @var \Convertim\Payment\ConvertimDifferentPaymentDataForTransports[]
     */
    private $differentPaymentDataForTransports;

    /**
     * @var \Convertim\Payment\ConvertimEssoxData
     */
    private $essox;

    /**
     * @param string $uuid
     * @param string $type
     * @param string $name
     * @param string $priceWithVat
     * @param string $priceWithoutVat
     * @param string $vat
     * @param string|null $image
     * @param \Convertim\Payment\ConvertimGoPayData|null $gopay
     * @param \Convertim\Payment\ConvertimAdyenData|null $adyen
     * @param string|null $paymentDescription
     * @param string[] $restrictedTransports
     * @param string|null $paymentInstruction ,
     * @param \Convertim\Payment\ConvertimStripeData|null $stripe
     * @param \Convertim\Payment\ConvertimComgateData|null $comgate
     * @param \Convertim\Payment\ConvertimTrustPayData|null $trustPay
     * @param \Convertim\Payment\ConvertimDifferentPaymentDataForTransports[] $differentPaymentDataForTransports
     * @param \Convertim\Payment\ConvertimEssoxData|null $essoxData
     */
    public function __construct(
        $uuid,
        $type,
        $name,
        $priceWithVat,
        $priceWithoutVat,
        $vat,
        $image = null,
        $gopay = null,
        $adyen = null,
        $paymentDescription = null,
        $restrictedTransports = [],
        $paymentInstruction = null,
        $stripe = null,
        $comgate = null,
        $trustPay = null,
        $differentPaymentDataForTransports = [],
        $essoxData = null
    ) {
        $this->uuid = $uuid;
        $this->type = $type;
        $this->name = $name;
        $this->priceWithVat = $priceWithVat;
        $this->priceWithoutVat = $priceWithoutVat;
        $this->vat = $vat;
        $this->image = $image;
        $this->gopay = $gopay;
        $this->adyen = $adyen;
        $this->paymentDescription = $paymentDescription;
        $this->restrictedTransports = $restrictedTransports;
        $this->paymentInstruction = $paymentInstruction;
        $this->stripe = $stripe;
        $this->comgate = $comgate;
        $this->trustPay = $trustPay;
        $this->essox = $essoxData;
        $this->differentPaymentDataForTransports = $differentPaymentDataForTransports;
    }

    /**
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'uuid' => $this->uuid,
            'type' => $this->type,
            'name' => $this->name,
            'priceWithVat' => $this->priceWithVat,
            'priceWithoutVat' => $this->priceWithoutVat,
            'vat' => $this->vat,
            'image' => $this->image,
            'gopay' => $this->gopay,
            'adyen' => $this->adyen,
            'paymentDescription' => $this->paymentDescription,
            'restrictedTransports' => $this->restrictedTransports,
            'paymentInstruction' => $this->paymentInstruction,
            'stripe' => $this->stripe,
            'comgate' => $this->comgate,
            'trustPay' => $this->trustPay,
            'differentPaymentDataForTransports' => $this->differentPaymentDataForTransports,
            'essox' => $this->essox,
        ];
    }
}
