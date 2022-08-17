<?php

namespace Analytics;

use Convertim\Analytics\ConvertimAnalytics;
use Convertim\Analytics\ConvertimAnalyticsFactory;
use Convertim\Analytics\Exceptions\ConnectionErrorException;
use Convertim\Analytics\Exceptions\ConvertimAnalyticsBatParameterException;
use PHPUnit\Framework\TestCase;

class ConvertimAnalyticsFactoryTest extends TestCase
{
    public function testDevelFactory()
    {
        $convertimAnalyticsFactory = new ConvertimAnalyticsFactory();
        $options = [
            'projectName' => 'dev',
            'isProductionMode' => false,
        ];

        $convertimAnalyticsExpected = new ConvertimAnalytics($options);
        $convertimAnalyticsCreatedByFactory = $convertimAnalyticsFactory->createConvertimAnalytics($options);

        $this->assertEquals($convertimAnalyticsExpected, $convertimAnalyticsCreatedByFactory);
        $this->assertEquals($convertimAnalyticsExpected->getProjectName(), $convertimAnalyticsCreatedByFactory->getProjectName());
        $this->assertEquals($convertimAnalyticsExpected->isProductionMode(), $convertimAnalyticsCreatedByFactory->isProductionMode());

        $this->assertEquals('dev', $convertimAnalyticsCreatedByFactory->getProjectName());
        $this->assertEquals(false, $convertimAnalyticsCreatedByFactory->isProductionMode());
    }

    public function testProductionFactory()
    {
        $convertimAnalyticsFactory = new ConvertimAnalyticsFactory();
        $options = [
            'projectName' => 'prod',
            'isProductionMode' => true,
        ];

        $convertimAnalyticsExpected = new ConvertimAnalytics($options);
        $convertimAnalyticsCreatedByFactory = $convertimAnalyticsFactory->createConvertimAnalytics($options);

        $this->assertEquals($convertimAnalyticsExpected, $convertimAnalyticsCreatedByFactory);
        $this->assertEquals($convertimAnalyticsExpected->getProjectName(), $convertimAnalyticsCreatedByFactory->getProjectName());
        $this->assertEquals($convertimAnalyticsExpected->isProductionMode(), $convertimAnalyticsCreatedByFactory->isProductionMode());

        $this->assertEquals('prod', $convertimAnalyticsCreatedByFactory->getProjectName());
        $this->assertEquals(true, $convertimAnalyticsCreatedByFactory->isProductionMode());
    }

    public function testMissingOptionsException()
    {
        $this->expectException(ConvertimAnalyticsBatParameterException::class);
        $this->expectExceptionMessage('Convertim analytics: missing parameter: projectName parameter is required');

        $convertimAnalyticsFactory = new ConvertimAnalyticsFactory();
        $options = [];

        $convertimAnalyticsFactory->createConvertimAnalytics($options);
    }

    public function testMissingProductionModeOptionsException()
    {
        $this->expectException(ConvertimAnalyticsBatParameterException::class);
        $this->expectExceptionMessage('Convertim analytics: missing parameter: isProductionMode parameter is required');

        $convertimAnalyticsFactory = new ConvertimAnalyticsFactory();
        $options = [
            'projectName' => 'prod',
        ];

        $convertimAnalyticsFactory->createConvertimAnalytics($options);
    }
}
