<?php

use Convertim\Store\ConvertimStoreOpeningHour;
use PHPUnit\Framework\TestCase;

class ConvertimStoreOpeningHourTest extends TestCase
{
    public function testIsConvertimStoreOpeningHourTransformValid()
    {
        $convertimStore = new ConvertimStoreOpeningHour(
            '1',
            'Monday',
            '08:00',
            '12:00',
            '13:00',
            '17:00'
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode($convertimStore),
            json_encode([
                'day' => '1',
                'dayName' => 'Monday',
                'openMorning' => '08:00',
                'closeMorning' => '12:00',
                'openAfternoon' => '13:00',
                'closeAfternoon' => '17:00',
            ])
        );
    }
}
