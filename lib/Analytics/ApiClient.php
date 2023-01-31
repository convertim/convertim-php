<?php

namespace Convertim\Analytics;

use Convertim\Analytics\Exceptions\ConnectionErrorException;
use GuzzleHttp\Exception\RequestException;

class ApiClient
{
    const CONVERTIM_AUTH_HEADER_NAME = 'x-convertim-auth';
    const CONVERTIM_AUTH_HEADER = 'cgh2nGttkmPv99wAkcC8WwoNkeUcEfyJ';

    const CONVERTIM_BASE_URI_DEVEL = 'https://convertim-api.tom-aws.eu';
    const CONVERTIM_BASE_URI_PRODUCTION = 'https://api.convertim.com';

    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    /**
     * @var boolean
     */
    private $isProductionMode;

    /**
     * @param \GuzzleHttp\Client $client
     * @param boolean $isProductionMode
     */
    public function __construct($client, $isProductionMode)
    {
        $this->client = $client;
        $this->isProductionMode = $isProductionMode;
    }

    /**
     * @param $convertimAnalyticsData
     * @return \GuzzleHttp\Message\ResponseInterface
     * @throws \Convertim\Analytics\Exceptions\ConnectionErrorException|\GuzzleHttp\
     */
    public function doRequest($convertimAnalyticsData)
    {
        $baseUri = $this->isProductionMode ? self::CONVERTIM_BASE_URI_PRODUCTION : self::CONVERTIM_BASE_URI_DEVEL;
        $options['headers'][self::CONVERTIM_AUTH_HEADER_NAME] = self::CONVERTIM_AUTH_HEADER;
        $options['json'] = $convertimAnalyticsData;

        try {
            return $this->client->post($baseUri . '/analytics', $options);
        } catch (RequestException $e) {
            throw new ConnectionErrorException();
        }
    }
}
