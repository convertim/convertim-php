<?php

namespace Convertim\OAuth;

use Convertim\Analytics\ApiClient;
use Convertim\OAuth\Exceptions\ConvertimOauthBatResponseException;
use GuzzleHttp\Client;

class ConvertimOAuth
{
    const OPTION_IS_PRODUCTION_MODE = 'isProductionMode';

    const OPTION_CLIENT_ID = 'clientId';
    const OPTION_CLIENT_SECRET = 'clientSecret';

    /**
     * @var \Convertim\OAuth\ApiClient
     */
    private $apiClient;

    /**
     * @var string[]
     */
    private $options;

    /**
     * @param array $options
     */
    public function __construct($options)
    {
        $this->options = $options;
    }

    public function getUserLoginToken($authCode)
    {
        $apiResponse = $this->getApiClient()->doRequest($this->options['clientId'], $this->options['clientSecret'], $authCode);

        try {
            $apiResponseJson = json_decode($apiResponse->getBody(), true);
            if (isset($apiResponseJson['token'])) {
                return $apiResponseJson['token'];
            }

            throw new ConvertimOauthBatResponseException('Token was not return in response', 0);
        } catch (\Exception $exception) {
            throw new ConvertimOauthBatResponseException($exception->getMessage(), $exception->getCode(), $exception);
        }
    }

    private function getApiClient()
    {
        if ($this->apiClient === null) {
            $this->apiClient = new ApiClient(new Client(), $this->options[self::OPTION_IS_PRODUCTION_MODE]);
        }

        return $this->apiClient;
    }
}
