<?php

namespace Convertim\Store;

class ConvertimStoreOpeningHour implements \JsonSerializable
{
    /**
     * @var int
     */
    private $day;

    /**
     * @var string
     */
    private $dayName;

    /**
     * @var string|null
     */
    private $openMorning;

    /**
     * @var string|null
     */
    private $closeMorning;

    /**
     * @var string|null
     */
    private $openAfternoon;

    /**
     * @var string|null
     */
    private $closeAfternoon;

    /**
     * @param int $day
     * @param string $dayName
     * @param string|null $openMorning
     * @param string|null $closeMorning
     * @param string|null $openAfternoon
     * @param string|null $closeAfternoon
     */
    public function __construct($day, $dayName, $openMorning, $closeMorning, $openAfternoon, $closeAfternoon)
    {
        $this->day = $day;
        $this->dayName = $dayName;
        $this->openMorning = $openMorning;
        $this->closeMorning = $closeMorning;
        $this->openAfternoon = $openAfternoon;
        $this->closeAfternoon = $closeAfternoon;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return [
            'day' => $this->day,
            'dayName' => $this->dayName,
            'openMorning' => $this->openMorning,
            'closeMorning' => $this->closeMorning,
            'openAfternoon' => $this->openAfternoon,
            'closeAfternoon' => $this->closeAfternoon,
        ];
    }
}
