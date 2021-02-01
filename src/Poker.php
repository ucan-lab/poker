<?php declare(strict_types=1);

namespace Poker;

use Exception;
use Poker\Card\Card;
use Poker\Card\HandCard;
use Poker\Card\Rank;
use Poker\Card\Suit;
use Poker\Hands\Hands;

/**
 * Class Poker
 */
final class Poker
{
    /**
     * @var array|HandCard
     */
    private $handCard = [];

    /**
     * Poker constructor.
     * @param string $input
     * @throws Exception
     */
    public function __construct(string $input)
    {
        $this->handCard = $this->parseCardList($input);
        $this->hands = new Hands($this->handCard);
    }

    /**
     * @return string
     */
    public function result(): string
    {
        return $this->hands->judge();
    }

    /**
     * @param string $input
     * @return HandCard
     * @throws Exception
     */
    private function parseCardList(string $input): HandCard
    {
        $input = str_replace(['D', 'C', 'S', 'H'], [' D', ' C', ' S', ' H'], $input);
        $inputList = explode(' ', trim($input));

        if (count($inputList) !== 5) {
            throw new Exception('Error in the number of cards.');
        }

        $cardList = [];

        foreach ($inputList as $inputCard) {
            $cardList[] = $this->parseCard($inputCard);
        }

        return new HandCard($cardList);
    }

    /**
     * @param string $inputCard
     * @return Card
     * @throws Exception
     */
    private function parseCard(string $inputCard): Card
    {
        $inputSuit = substr($inputCard, 0, 1);
        $inputRank = substr($inputCard, 1);

        $suit = new Suit($inputSuit);
        $rank = new Rank($inputRank);

        return new Card($suit, $rank);
    }
}
