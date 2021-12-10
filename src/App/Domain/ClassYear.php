<?php

namespace App\Domain;

final class ClassYear
{
    private int $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        // For class year, our business rules is from 1901-2999
        if (! preg_match('/^((19\d{2})|(2)\d{3})$/', $value)) {
            throw new \InvalidArgumentException('Invalid year');
        }

        $this->value = $value;
    }

    public function value(): int
    {
        return $this->value;
    }
}
