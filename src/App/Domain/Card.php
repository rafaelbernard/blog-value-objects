<?php

namespace App\Domain;

class Card
{
    public CardSuit $suit;
    public CardRank $rank;

    public function __construct(CardSuit $suit, CardRank $rank)
    {
        $this->suit = $suit;
        $this->rank = $rank;
    }

    public function suit(): CardSuit
    {
        return $this->suit;
    }

    public function rank(): CardRank
    {
        return $this->rank;
    }
}
