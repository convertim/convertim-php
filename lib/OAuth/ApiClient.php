<?php

namespace Convertim\OAuth;

use Convertim\OAuth\Exceptions\ConnectionErrorException;
use GuzzleHttp\Exception\RequestException;

class ApiClient
{
    const AUTH_HEADER_NAME = 'Authorization';
    const CONVERTIM_AUTH_HEADER_NAME = 'x-convertim-auth';
    const CONVERTIM_AUTH_HEADER = 'Ahyck8NcrHpwP8uP8VpfjhzmNuWKrTAJphV4KtrRmnAKosTR46VVH7Dys2NtUAWiWuvRoqkDRvHq6hbkMKWyauPruKa8F2xGz2g3';

    const CONVERTIM_BASE_URI_DEVEL = 'https://api.convertim.dev';
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
     * @param string $clientId
     * @param string $clientSecret
     * @param string $authCode
     * @return \GuzzleHttp\Psr7\Response
     * @throws \Convertim\Oauth\Exceptions\ConnectionErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function doRequest($clientId, $clientSecret, $authCode)
    {
        $options['base_uri'] = $this->isProductionMode ? self::CONVERTIM_BASE_URI_PRODUCTION : self::CONVERTIM_BASE_URI_DEVEL;
        $options['headers'][self::AUTH_HEADER_NAME] = sprintf('BASIC %s', base64_encode($clientId . ':' . $clientSecret));
        $options['headers'][self::CONVERTIM_AUTH_HEADER_NAME] = self::CONVERTIM_AUTH_HEADER;
        $options['query'] = [
            'path' => 'token',
            'authCode' => $authCode,
        ];

        try {
            return $this->client->request('POST', 'oauth', $options);
        } catch (RequestException $e) {
            throw new ConnectionErrorException();
        }
    }
}
