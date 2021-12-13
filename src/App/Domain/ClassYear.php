<?php

namespace App\Domain;

class ClassYear
{
    private int $value;

    /**
     * @param int $value
     */
    public function __construct(int $value)
    {
        // For class year, our business rules is from 1901-2999
        if (!preg_match('/^((19\d{2})|(2)\d{3})$/', $value)) {
            throw new \InvalidArgumentException('Invalid year');
        }

        $this->value = $value;
    }

    public static function fromNow(): self
    {
        return new self(date('Y'));
    }

    public function value(): int
    {
        return $this->value;
    }

    public function isAlumni(): bool
    {
        return date('Y') - $this->value >= 13;
    }
}
