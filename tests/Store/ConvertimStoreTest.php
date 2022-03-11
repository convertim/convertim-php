<?php

use Convertim\Store\ConvertimStore;
use PHPUnit\Framework\TestCase;

class ConvertimStoreTest extends TestCase
{
    public function testIsConvertimStoreOpeningHourTransformValid()
    {
        $convertimStore = new ConvertimStore(
            'ABC',
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
                'code' => 'ABC',
                'latitude' => '51.123',
                'longitude' => '15.456',
                'company' => 'Company',
                'street' => 'Street',
                'postcode' => '10000',
                'city' => 'Prague',
                'source' => 'store',
                'hours' => [],
            ])
        );
    }
}
