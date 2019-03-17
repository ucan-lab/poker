<?php

declare(strict_types=1);

namespace Poker\Card;

use Exception;

/**
 * Class Rank
 * @package Poker\Card
 */
final class Rank
{
    const RANKS = [
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        '10',
        'J',
        'Q',
        'K',
        'A',
    ];

    /**
     * @var string
     */
    private $name;

    /**
     * Rank constructor.
     * @param string $name
     * @throws Exception
     */
    public function __construct(string $name)
    {
        if (!in_array ($name, self::RANKS, true)) {
            throw new Exception('Rank not exists.');
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
