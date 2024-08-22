<?php

use Convertim\Transport\ConvertimTransport;
use Convertim\Transport\ConvertimTransportType;
use PHPUnit\Framework\TestCase;

class ConvertimTransportTest extends TestCase
{
    public function testIsConvertimTransportTransformValid()
    {
        $convertimTransport = new ConvertimTransport(
            '1111-1111-1111-1111',
            'transport',
            true,
            ConvertimTransportType::CONVERTIM_TRANSPORT_TYPE_PICKUP_PLACE,
            '121',
            '100',
            '21',
            'path/to/image',
            'description',
            'DPD',
            'pickup places',
            [],
            'Instruction',
            'Tomorrow'
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode($convertimTransport),
            json_encode([
                'uuid' => '1111-1111-1111-1111',
                'name' => 'transport',
                'isShortForm' => true,
                'type' => 'pickupPlace',
                'image' => 'path/to/image',
                'priceWithVat' => '121',
                'priceWithoutVat' => '100',
                'vat' => '21',
                'transportDescription' => 'description',
                'source' => 'DPD',
                'group' => 'pickup places',
                'services' => [],
                'transportInstruction' => 'Instruction',
                'deliveryTime' => 'Tomorrow',
                'exceedLimit' => false,
                'convertimTransportExpressData' => null,
                'groupDescription' => null,
                'calculatedDeliveryTime' => null,
                'label' => null,
                'pickupPointType' => null,
            ])
        );
    }
}
