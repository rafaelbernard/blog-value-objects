<?php

namespace Blog\Domain;

final class Card
{
    public ?CardSuit $suit = null;
    public ?CardRank $rank = null;
}
