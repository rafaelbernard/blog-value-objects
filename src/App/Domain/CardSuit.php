<?php

namespace App\Domain;

class CardSuit
{
    const HEARTS = 'H';
    const DIAMONDS = 'D';
    const CLUBS = 'C';
    const SPADES = 'S';

    const SUITS = [
        self::HEARTS,
        self::DIAMONDS,
        self::CLUBS,
        self::SPADES,
    ];

    private string $value;

    public function __construct(string $value)
    {
        if (!in_array($value, self::SUITS)) {
            throw new \InvalidArgumentException("`$value` is not a valid card suit.");
        }

        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
