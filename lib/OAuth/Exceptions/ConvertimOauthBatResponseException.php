<?php

namespace Convertim\OAuth\Exceptions;

class ConvertimOauthBatResponseException extends \Exception implements ConvertimOauthException
{

    /**
     * @param string $exceptionMessage
     * @param int $code
     * @param string|null $prev
     */
    public function __construct($exceptionMessage, $code = 0, $prev = null)
    {
        $message = sprintf('Convertim oauth: bad response, exception message: %s', $exceptionMessage);

        return parent::__construct($message, $code, $prev);
    }
}
