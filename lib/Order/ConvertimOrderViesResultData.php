<?php

namespace Convertim\Order;

class ConvertimOrderViesResultData
{
    /**
     * @var bool
     */
    private $isValid;

    /**
     * @var \DateTime
     */
    private $requestDate;

    /**
     * @var string
     */
    private $userError;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $requestIdentifier;

    /**
     * @var string
     */
    private $originalVatNumber;

    /**
     * @var string
     */
    private $vatNumber;

    /**
     * @param bool $isValid
     * @param \DateTime $requestDate
     * @param string $userError
     * @param string $name
     * @param string $address
     * @param string $requestIdentifier
     * @param string $originalVatNumber
     * @param string $vatNumber
     */
    public function __construct($isValid, \DateTime $requestDate, $userError, $name, $address, $requestIdentifier, $originalVatNumber, $vatNumber)
    {
        $this->isValid = $isValid;
        $this->requestDate = $requestDate;
        $this->userError = $userError;
        $this->name = $name;
        $this->address = $address;
        $this->requestIdentifier = $requestIdentifier;
        $this->originalVatNumber = $originalVatNumber;
        $this->vatNumber = $vatNumber;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->isValid;
    }

    /**
     * @return \DateTime
     */
    public function getRequestDate()
    {
        return $this->requestDate;
    }

    /**
     * @return string
     */
    public function getUserError()
    {
        return $this->userError;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getRequestIdentifier()
    {
        return $this->requestIdentifier;
    }

    /**
     * @return string
     */
    public function getOriginalVatNumber()
    {
        return $this->originalVatNumber;
    }

    /**
     * @return string
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }
}
