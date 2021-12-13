<?php

namespace App\Domain;

class Age
{
    private int $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        if ($value < 0) {
            throw new \UnexpectedValueException('Negative numbers are not a valid age.');
        }

        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
