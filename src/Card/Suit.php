<?php declare(strict_types=1);

namespace Poker\Card;

use Exception;

/**
 * Class Suit
 */
final class Suit
{
    const SUITS = [
        'S',
        'H',
        'C',
        'D',
    ];

    /**
     * @var string
     */
    private $name;

    /**
     * Suit constructor.
     * @param string $name
     * @throws Exception
     */
    public function __construct(string $name)
    {
        if (!in_array($name, self::SUITS, true)) {
            throw new Exception('Suit not exists.');
        }

        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
