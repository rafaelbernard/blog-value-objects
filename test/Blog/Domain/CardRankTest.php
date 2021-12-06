<?php

namespace Test\Blog\Domain;

use Blog\Domain\CardRank;
use Test\TestCase;

class CardRankTest extends TestCase
{
    const INVALID_GRADE = '1';

    /**
     * @dataProvider provideRanks
     */
    public function testItCanBeInstantiated($rank)
    {
        $cardRank = new CardRank($rank);

        self::assertInstanceOf(CardRank::class, $cardRank);
        self::assertEquals($rank, $cardRank);
    }

    public function provideRanks(): array
    {
        return array_map(function ($rank) {
            return [$rank];
        }, CardRank::RANKS);
    }

    public function testItCanNotBeCreatedFromAnInvalid()
    {
        $value = self::INVALID_GRADE;

        self::expectException(\InvalidArgumentException::class);
        self::expectExceptionMessage("`$value` is not a valid card rank.");

        new CardRank($value);
    }
}