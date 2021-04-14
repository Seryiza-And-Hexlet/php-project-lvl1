<?php

namespace BrainGames\Games\PrimeGame;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
{
    $half = $number / 2;
    for ($i = 2; $i < $half; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function getPrimeGame(): array
{
    $game = function () {
        $number = rand(1, 100);
        $answer = isPrime($number) ? 'yes' : 'no';
        return [$number, $answer];
    };

    return [RULES, $game];
}
