<?php

namespace Convertim\Payment;

class ConvertimEssoxData implements \JsonSerializable
{
    /**
     * @var boolean
     */
    private $spreadedInstalments;

    /**
     * @param boolean $spreadedInstalments
     */
    public function __construct($spreadedInstalments)
    {
        $this->spreadedInstalments = $spreadedInstalments;
    }

    /**
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'spreadedInstalments' => $this->spreadedInstalments,
        ];
    }
}
