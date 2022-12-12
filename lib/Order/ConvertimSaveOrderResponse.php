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
     * @param string $internalOrderId
     * @param string $orderNumber
     * @param string|null $orderHash
     * @param string|null $orderNotPaidUrl
     */
    public function __construct($internalOrderId, $orderNumber, $orderHash, $orderNotPaidUrl)
    {
        $this->internalOrderId = $internalOrderId;
        $this->orderNumber = $orderNumber;
        $this->orderHash = $orderHash;
        $this->orderNotPaidUrl = $orderNotPaidUrl;
    }


    public function jsonSerialize()
    {
        return [
            'internalOrderId' => $this->internalOrderId,
            'orderNumber' => $this->orderNumber,
            'orderHash' => $this->orderHash,
            'orderNotPaidUrl' => $this->orderNotPaidUrl,
        ];
    }
}
