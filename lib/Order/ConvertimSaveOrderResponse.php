<?php

namespace Convertim\Order;

class ConvertimSaveOrderResponse implements \JsonSerializable
{
    /**
     * @var string
     */
    private $internalOrderId;

    /**
     * @var string
     */
    private $orderNumber;

    /**
     * @var string|null
     */
    private $orderHash;

    /**
     * @var string|null
     */
    private $orderNotPaidUrl;

    /**
     * @var string|null
     */
    private $orderPaidUrl;

    /**
     * @var string|null
     */
    private $orderRedirectUrl;

    /**
     * @var array
     */
    private $gtm;

    /**
     * @param string $internalOrderId
     * @param string $orderNumber
     * @param string|null $orderHash
     * @param string|null $orderNotPaidUrl
     * @param string|null $orderPaidUrl
     * @param string|null $orderRedirectUrl
     * @param array $gtm
     */
    public function __construct(
        $internalOrderId,
        $orderNumber,
        $orderHash = null,
        $orderNotPaidUrl = null,
        $orderPaidUrl = null,
        $orderRedirectUrl = null,
        $gtm = []
    ) {
        $this->internalOrderId = $internalOrderId;
        $this->orderNumber = $orderNumber;
        $this->orderHash = $orderHash;
        $this->orderNotPaidUrl = $orderNotPaidUrl;
        $this->orderPaidUrl = $orderPaidUrl;
        $this->orderRedirectUrl = $orderRedirectUrl;
        $this->gtm = $gtm;
    }


    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'internalOrderId' => $this->internalOrderId,
            'orderNumber' => $this->orderNumber,
            'orderHash' => $this->orderHash,
            'orderNotPaidUrl' => $this->orderNotPaidUrl,
            'orderPaidUrl' => $this->orderPaidUrl,
            'orderRedirectUrl' => $this->orderRedirectUrl,
            'gtm' => $this->gtm,
        ];
    }
}
