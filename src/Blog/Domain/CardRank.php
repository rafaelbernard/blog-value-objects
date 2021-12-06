<?php

namespace Blog\Domain;

class CardRank
{
    const ACE = 'A';
    const KING = 'K';
    const QUEEN = 'Q';
    const JACK = 'J';
    const TEN = 'X';
    const NINE = '9';
    const EIGHT = '8';
    const SEVEN = '7';
    const SIX = '6';
    const FIVE = '5';
    const FOUR = '4';
    const THREE = '3';
    const TWO = '2';

    const RANKS = [
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

    private string $value;

    public function __construct(string $value)
    {
        if (!in_array($value, self::RANKS)) {
            throw new \InvalidArgumentException("`$value` is not a valid rank.");
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
