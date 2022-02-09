<?php

namespace Convertim\Order;

class ConvertimValidationResult
{
    /**
     * @var bool
     */
    public $isValid = true;

    /**
     * @var string[]
     */
    public $errors = [];

    /**
     * @param string $error
     */
    public function addError($error)
    {
        $this->isValid = false;
        $this->errors[] = $error;
    }
}
