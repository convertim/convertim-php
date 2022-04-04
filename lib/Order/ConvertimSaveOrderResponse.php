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
     * @param string $internalOrderId
     * @param string $orderNumber
     * @param string|null $orderHash
     */
    public function __construct($internalOrderId, $orderNumber, $orderHash)
    {
        $this->internalOrderId = $internalOrderId;
        $this->orderNumber = $orderNumber;
        $this->orderHash = $orderHash;
    }


    public function jsonSerialize()
    {
        return [
            'internalOrderId' => $this->internalOrderId,
            'orderNumber' => $this->orderNumber,
            'orderHash' => $this->orderHash,
        ];
    }
}