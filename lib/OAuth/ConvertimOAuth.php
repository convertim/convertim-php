<?php

namespace Convertim\OAuth;

use Convertim\OAuth\Exceptions\ConvertimOauthBatResponseException;
use GuzzleHttp\Client;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Signer\Key\LocalFileReference;
use Lcobucci\JWT\Signer\Rsa\Sha256;
use Lcobucci\JWT\Token\Parser;
use Lcobucci\JWT\Validation\Constraint\SignedWith;
use Lcobucci\JWT\Validation\Validator;

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

    /**
     * @param string $authCode
     * @return \Lcobucci\JWT\Token
     */
    public function getUserLoginToken($authCode)
    {
        $apiResponse = $this->getApiClient()->doRequest($this->options['clientId'], $this->options['clientSecret'], $authCode);

        try {
            $apiResponseJson = json_decode($apiResponse->getBody(), true);
            if (!isset($apiResponseJson['token'])) {
                throw new ConvertimOauthBatResponseException('Token was not return in response', 0);
            }

            $parser = new Parser(new JoseEncoder());
            $validator = new Validator();

            $stringToken = $apiResponseJson['token'];
            $token = $parser->parse($stringToken);
            if (! $validator->validate($token, new SignedWith(new Sha256(), InMemory::file('./assets/convertim_oauth.pub')))) {
                throw new ConvertimOauthBatResponseException('Token is invalid', 0);
            }

            return $token;

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
