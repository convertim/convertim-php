<?php

use Convertim\Cart\ConvertimCartItem;
use Convertim\Cart\ConvertimCartItemAdditional;
use Convertim\Cart\ConvertimCartItemDiscount;
use PHPUnit\Framework\TestCase;

class ConvertimCartItemTest extends TestCase
{
    public function testIsConvertimCartItemTransformValid()
    {
        $convertimItem = new ConvertimCartItem(
            '1',
            'TEST',
            1.5,
            200,
            221,
            21,
            'path/to/image.svg'
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode($convertimItem),
            json_encode([
                'id' => '1',
                'name' => 'TEST',
                'quantity' => 1.5,
                'priceWithoutVat' => 200,
                'priceWithVat' => 221,
                'vat' => 21,
                'image' => 'path/to/image.svg',
                'gtm' => [],
                'discounts' => [],
                'additional' => [],
                'labels' => [],
            ])
        );
    }

    public function testIsConvertimCartItemWithFullDataTransformValid()
    {
        $convertimItem = new ConvertimCartItem(
            '1',
            'TEST',
            1.5,
            200,
            221,
            21,
            'path/to/image.svg',
            [
                'category' => 'Category',
            ],
            [
                new ConvertimCartItemDiscount('PROMO', '100 EUR')
            ],
            [
                new ConvertimCartItemAdditional('Color', 'Black'),
            ],
            [
                'PROMO CODE'
            ]
        );

        $this->assertJsonStringEqualsJsonString(
            json_encode($convertimItem),
            json_encode([
                'id' => '1',
                'name' => 'TEST',
                'quantity' => 1.5,
                'priceWithoutVat' => 200,
                'priceWithVat' => 221,
                'vat' => 21,
                'image' => 'path/to/image.svg',
                'gtm' => [
                    'category' => 'Category',
                ],
                'discounts' => [
                    'PROMO' => '100 EUR',
                ],
                'additional' => [
                    [
                        'name' => 'Color',
                        'value' => 'Black'
                    ],
                ],
                'labels' => [
                    'PROMO CODE',
                ],
            ])
        );
    }
}
