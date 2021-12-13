<?php

namespace Test\App\Domain;

use App\Domain\Card;
use App\Domain\CardRank;
use App\Domain\CardSuit;
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    public function testCanInstantiate()
    {
        $class = new Card(new CardSuit(CardSuit::SPADES), new CardRank(CardRank::ACE));

        self::assertInstanceOf(Card::class, $class);
    }
}
