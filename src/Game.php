<?php

namespace BrainGames\Game;

use function cli\line;
use function cli\prompt;

const GAMES_COUNT_TO_WIN = 3;
const DEFAULT_USERNAME_DISABLED = null;

function playGame(string $gameRules, callable $game): void
{
    line('Welcome to the Brain Games!');
    $playerName = prompt('May I have your name?', DEFAULT_USERNAME_DISABLED, ' ');
    line("Hello, {$playerName}!");

    line($gameRules);
    for ($i = 0; $i < GAMES_COUNT_TO_WIN; $i++) {
        [$questionText, $correctAnswer] = $game();
        line("Question: {$questionText}");
        $enteredAnswer = prompt('Your answer');

        $isCorrect = $enteredAnswer === (string) $correctAnswer;
        if ($isCorrect) {
            line('Correct!');
        } else {
            line("'{$enteredAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            break;
        }
    }

    $didWin = $i === GAMES_COUNT_TO_WIN;
    if ($didWin) {
        line("Congratulations, {$playerName}!");
    } else {
        line("Let's try again, {$playerName}!");
    }
}
