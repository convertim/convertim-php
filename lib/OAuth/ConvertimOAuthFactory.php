<?php

namespace Convertim\OAuth;

use Convertim\OAuth\Exceptions\ConvertimOauthBatParameterException;

class ConvertimOAuthFactory
{
    /**
     * @param array $options
     * @return \Convertim\OAuth\ConvertimOAuth
     * @throws \Convertim\OAuth\Exceptions\ConvertimOauthBatParameterException
     */
    public function createConvertimOAuth($options)
    {
        if (array_key_exists(ConvertimOAuth::OPTION_CLIENT_ID, $options) === false) {
            throw new ConvertimOauthBatParameterException(ConvertimOAuth::OPTION_CLIENT_ID);
        }

        if (array_key_exists(ConvertimOAuth::OPTION_CLIENT_SECRET, $options) === false) {
            throw new ConvertimOauthBatParameterException(ConvertimOAuth::OPTION_CLIENT_SECRET);
        }

        if (array_key_exists(ConvertimOAuth::OPTION_IS_PRODUCTION_MODE, $options) === false) {
            throw new ConvertimOauthBatParameterException(ConvertimOAuth::OPTION_IS_PRODUCTION_MODE);
        }

        return new ConvertimOAuth($options);
    }
}
