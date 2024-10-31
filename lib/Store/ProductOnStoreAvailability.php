<?php

namespace Convertim\Store;

class ProductOnStoreAvailability implements \JsonSerializable
{
    /**
     * @var string
     */
    private $productUuid;

    /**
     * @var string
     */
    private $availability;

    /**
     * @param string $productUuid
     * @param string $availability
     */
    public function __construct($productUuid, $availability)
    {
        $this->productUuid = $productUuid;
        $this->availability = $availability;
    }


    /**
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'productUuid' => $this->productUuid,
            'availability' => $this->availability,
        ];
    }
}
