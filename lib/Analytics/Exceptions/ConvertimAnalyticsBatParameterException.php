<?php

namespace Convertim\Analytics\Exceptions;

class ConvertimAnalyticsBatParameterException extends \Exception implements ConvertimAnalyticsException
{

    public function __construct($parameterName, $code = 0)
    {
        $message = sprintf('Convertim analytics: missing parameter: %s parameter is required', $parameterName);

        return parent::__construct($message, $code);
    }
}
