<?php

namespace Convertim\Order;

class ConvertimOrderEssoxData
{
    /**
     * @var string
     */
    private $contractId;

    /**
     * @param string $contractId
     */
    public function __construct(
        $contractId
    ) {
        $this->contractId = $contractId;
    }

    /**
     * @return string
     */
    public function getContractId()
    {
        return $this->contractId;
    }
}
