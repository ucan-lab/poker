<?php declare(strict_types=1);

namespace Poker\Hands;

use Poker\Card\HandCard;

/**
 * Class Hands
 */
final class Hands
{
    const FOUR_CARD = '4K';
    const FULL_HOUSE = 'FH';
    const THREE_CARD = '3K';
    const TWO_PAIR = '2P';
    const ONE_PAIR = '1P';
    const NO_PAIR = '--';

    /**
     * @var HandCard
     */
    private $handCard;

    /**
     * Hands constructor.
     * @param HandCard $handCard
     */
    public function __construct(HandCard $handCard)
    {
        $this->handCard = $handCard;
    }

    /**
     * @return string
     */
    public function judge(): string
    {
        if ($this->isFourCard()) {
            return self::FOUR_CARD;
        }

        if ($this->isFullHouse()) {
            return self::FULL_HOUSE;
        }

        if ($this->isThreeCard()) {
            return self::THREE_CARD;
        }

        if ($this->isTwoPair()) {
            return self::TWO_PAIR;
        }

        if ($this->isOnePair()) {
            return self::ONE_PAIR;
        }

        return self::NO_PAIR;
    }

    /**
     * @return bool
     */
    private function isFourCard(): bool
    {
        foreach ($this->handCard->getRankCount() as $count) {
            if ($count === 4) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    private function isFullHouse(): bool
    {
        return $this->isThreeCard() && $this->isOnePair();
    }

    /**
     * @return bool
     */
    private function isThreeCard(): bool
    {
        foreach ($this->handCard->getRankCount() as $count) {
            if ($count === 3) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    private function isTwoPair(): bool
    {
        $existsOnePair = false;

        foreach ($this->handCard->getRankCount() as $count) {
            if ($count === 2) {
                if ($existsOnePair) {
                    return true;
                }

                $existsOnePair = true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    private function isOnePair(): bool
    {
        foreach ($this->handCard->getRankCount() as $count) {
            if ($count === 2) {
                return true;
            }
        }

        return false;
    }
}
