<?php

namespace BrainGames\Games\EvenGame;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function getEvenGame(): array
{
    $game = function (): array {
        $number = rand(1, 100);
        $answer = isEven($number) ? 'yes' : 'no';
        return [$number, $answer];
    };

    return [RULES, $game];
}
