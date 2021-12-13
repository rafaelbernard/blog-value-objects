<?php

namespace Test\App\Domain;

use App\Domain\CardSuit;
use Test\TestCase;

class CardSuitTest extends TestCase
{
    public const INVALID_SUIT = 'Invalids';

    /**
     * @dataProvider provideSuits
     */
    public function testItCanBeInstantiated($suit)
    {
        $cardSuit = new CardSuit($suit);

        self::assertInstanceOf(CardSuit::class, $cardSuit);
        self::assertEquals($suit, $cardSuit);
    }

    public function provideSuits(): array
    {
        return array_map(function ($suit) {
            return [$suit];
        }, CardSuit::SUITS);
    }

    public function testItCanNotBeCreatedFromAnInvalid()
    {
        $value = self::INVALID_SUIT;

        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage("`$value` is not a valid card suit.");

        new CardSuit($value);
    }
}
