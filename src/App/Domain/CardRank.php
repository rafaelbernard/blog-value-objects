<?php

namespace App\Domain;

class CardRank
{
    public const ACE = 'A';
    public const KING = 'K';
    public const QUEEN = 'Q';
    public const JACK = 'J';
    public const TEN = 'X';
    public const NINE = '9';
    public const EIGHT = '8';
    public const SEVEN = '7';
    public const SIX = '6';
    public const FIVE = '5';
    public const FOUR = '4';
    public const THREE = '3';
    public const TWO = '2';

    public const RANKS = [
        self::ACE,
        self::KING,
        self::QUEEN,
        self::JACK,
        self::TEN,
        self::NINE,
        self::EIGHT,
        self::SEVEN,
        self::SIX,
        self::FIVE,
        self::FOUR,
        self::THREE,
        self::TWO
    ];

    public const WEIGHTS = [
        self::ACE => 20,
        self::KING => 13,
        self::QUEEN => 12,
        self::JACK => 11,
        self::TEN => 10,
        self::NINE => 9,
        self::EIGHT => 8,
        self::SEVEN => 7,
        self::SIX => 6,
        self::FIVE => 5,
        self::FOUR => 4,
        self::THREE => 3,
        self::TWO => 2
    ];

    private string $value;

    public function __construct(string $value)
    {
        if (!in_array($value, self::RANKS)) {
            throw new \InvalidArgumentException("`$value` is not a valid card rank.");
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

    public function weight(): int
    {
        return self::WEIGHTS[$this->value];
    }

    public function isGreaterThan(CardRank $cardRank): bool
    {
        return $this->weight() > $cardRank->weight();
    }

    // Some helper static functions can be created to be more readable

    public static function two(): CardRank
    {
        return new self(self::TWO);
    }

    public static function ace(): CardRank
    {
        return new self(self::ACE);
    }
}
