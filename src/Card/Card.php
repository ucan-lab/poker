<?php

declare(strict_types=1);

namespace Poker\Card;

/**
 * Class Card
 * @package Poker\Card
 */
final class Card
{
    /**
     * @var Suit
     */
    private $suit;

    /**
     * @var Rank
     */
    private $rank;

    /**
     * Card constructor.
     * @param Suit $suit
     * @param Rank $rank
     */
    public function __construct(Suit $suit, Rank $rank)
    {
        $this->suit = $suit;
        $this->rank = $rank;
    }

    /**
     * @return string
     */
    public function show (): string
    {
        return $this->suit->getName() . $this->rank->getName();
    }

    /**
     * @return string
     */
    public function getSuitName(): string
    {
        return $this->suit->getName();
    }

    /**
     * @return string
     */
    public function getRankName(): string
    {
        return $this->rank->getName();
    }
}
