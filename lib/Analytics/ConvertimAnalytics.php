<?php

namespace Convertim\Analytics;

use Convertim\Analytics\Exceptions\ConnectionErrorException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ConvertimAnalytics
{

    const OPTION_PROJECT_NAME = 'projectName';
    const OPTION_IS_PRODUCTION_MODE = 'isProductionMode';

    /**
     * @var mixed[]
     */
    private $options;

    /**
     * @var \Convertim\Analytics\ApiClient
     */
    private $apiClient;

    /**
     * @param array $options
     */
    public function __construct($options)
    {
        $this->options = $options;
    }

    /**
     * @param \Convertim\Analytics\ConvertimAnalyticsData $convertimAnalyticsData
     */
    public function collect($convertimAnalyticsData)
    {
        try {
            $this->getApiClient()->doRequest($convertimAnalyticsData);
        } catch (GuzzleException $ex) {
        } catch (\Exception $e) {
        }
    }

    /**
     * @return boolean
     */
    public function isProductionMode()
    {
        return $this->options[self::OPTION_IS_PRODUCTION_MODE];
    }

    /**
     * @return string
     */
    public function getProjectName()
    {
        return $this->options[self::OPTION_PROJECT_NAME];
    }

    /**
     * @return \Convertim\Analytics\ApiClient
     */
    private function getApiClient()
    {
        if ($this->apiClient === null) {
            $this->apiClient = new ApiClient(new Client(), $this->options[self::OPTION_IS_PRODUCTION_MODE]);
        }

        return $this->apiClient;
    }
}
