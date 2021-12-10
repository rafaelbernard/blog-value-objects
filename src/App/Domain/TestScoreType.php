<?php

namespace App\Domain;

// PHP 5.6 compatible to simulate Enums
class TestScoreType
{
    const ACT_V1 = 'ACT_V1';
    const ACT_V2 = 'ACT_V2';
    const ACT_ASPIRE_V1 = 'ACT_ASPIRE_V1';

    const TYPES = [
        self::ACT_ASPIRE_V1,
        self::ACT_V1,
        self::ACT_V2,
    ];

    const DISCONTINUED_TEST_TYPES = [
        self::ACT_V1,
    ];

    /** @var string */
    private $value;

    /**
     * @param string $value
     */
    public function __construct($value)
    {
        if (!in_array($value, self::TYPES)) {
            throw new \InvalidArgumentException("`$value` is not a valid test score type.");
        }

        $this->value = $value;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isDiscontinued()
    {
        return in_array($this->value(), self::DISCONTINUED_TEST_TYPES);
    }
}
