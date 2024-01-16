<?php

use Convertim\Store\ConvertimStore;
use PHPUnit\Framework\TestCase;

class ConvertimStoreTest extends TestCase
{
    public function testIsConvertimStoreOpeningHourTransformValid()
    {
        $convertimStore = new ConvertimStore(
            'ABC',
            'code',
            '51.123',
            '15.456',
            'Company',
            'Street',
            '10000',
            'Prague',
            []
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode($convertimStore),
            json_encode([
                'name' => 'ABC',
                'code' => 'code',
                'latitude' => '51.123',
                'longitude' => '15.456',
                'company' => 'Company',
                'street' => 'Street',
                'postcode' => '10000',
                'city' => 'Prague',
                'source' => 'stores',
                'hours' => [],
                'availability' => null,
                'productOnStoreAvailability' => [],
            ])
        );
    }
}
