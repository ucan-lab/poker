<?php declare(strict_types=1);

namespace Poker\Card;

use ArrayIterator;
use IteratorAggregate;

/**
 * Class HandCard
 */
final class HandCard implements IteratorAggregate
{
    /**
     * @var array
     */
    private $attributes = [];

    /**
     * @var array
     */
    private $suitCount = [];

    /**
     * @var array
     */
    private $rankCount = [];

    /**
     * HandCard constructor.
     * @param $attributes
     */
    public function __construct($attributes)
    {
        $this->attributes = $attributes;

        $this->calcCount();
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->attributes);
    }

    /**
     * @return array
     */
    public function getSuitCount(): array
    {
        return $this->suitCount;
    }

    /**
     * @return array
     */
    public function getRankCount(): array
    {
        return $this->rankCount;
    }

    private function calcCount(): void
    {
        $suits = [];
        $ranks = [];

        foreach ($this as $card) {
            $suits[] = $card->getSuitName();
            $ranks[] = $card->getRankName();
        }

        $this->suitCount = array_count_values($suits);
        $this->rankCount = array_count_values($ranks);
    }
}
