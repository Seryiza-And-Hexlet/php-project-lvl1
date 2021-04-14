<?php

namespace BrainGames\Games\GCDGame;

const RULES = 'Find the greatest common divisor of given numbers.';

function findGCD(int $a, int $b): int
{
    $min = min($a, $b);
    $max = max($a, $b);
    $remainder = $max % $min;

    while ($remainder !== 0) {
        $max = $min;
        $min = $remainder;
        $remainder = $max % $min;
    };

    return $min;
}

function getGCDGame(): array
{
    $game = function () {
        $a = rand(1, 50);
        $b = rand(1, 50);
        $gcd = findGCD($a, $b);

        $question = "{$a} {$b}";
        return [$question, $gcd];
    };

    return [RULES, $game];
}
