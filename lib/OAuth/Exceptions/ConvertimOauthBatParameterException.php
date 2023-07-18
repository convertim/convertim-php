<?php

namespace Convertim\OAuth\Exceptions;

class ConvertimOauthBatParameterException extends \Exception implements ConvertimOauthException
{

    public function __construct($parameterName, $code = 0)
    {
        $message = sprintf('Convertim oauth: missing parameter: %s parameter is required', $parameterName);

        return parent::__construct($message, $code);
    }
}
