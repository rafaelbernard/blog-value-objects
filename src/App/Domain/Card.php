<?php

namespace App\Domain;

class Card
{
    public ?CardSuit $suit = null;
    public ?CardRank $rank = null;
}
