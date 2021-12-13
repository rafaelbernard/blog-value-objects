<?php

namespace App\Domain;

class CardSuit
{
    public const HEARTS = 'H';
    public const DIAMONDS = 'D';
    public const CLUBS = 'C';
    public const SPADES = 'S';

    public const SUITS = [
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

    // Some helper static functions can be created to be more readable

    public static function spades(): CardSuit
    {
        return new self(self::SPADES);
    }
}
