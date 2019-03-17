<?php

declare(strict_types=1);

require_once "vendor/autoload.php";

use Poker\Poker;

// テスト
$test = [
    'DASAD10CAHA' => '4K',
    'S10HJDJCJSJ' => '4K',
    'S10HAD10DAC10' => 'FH',
    'HJDJC3SJS3' => 'FH',
    'S3S4H3D3DA' => '3K',
    'S2HADKCKSK' => '3K',
    'SASJDACJS10' => '2P',
    'S2S10H10HKD2' => '2P',
    'CKH10D10H3HJ' => '1P',
    'C3D3S10SKS2' => '1P',
    'S3SJDAC10SQ' => '--',
    'C3C9SAS10D2' => '--',
];

foreach ($test as $key => $value) {
    echo "$key: $value" . PHP_EOL;
    $poker = new Poker($key);
    $answer = $poker->result();
    assert($answer === $value);
}
