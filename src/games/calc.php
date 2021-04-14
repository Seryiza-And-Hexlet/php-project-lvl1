<?php

namespace BrainGames\Games\CalcGame;

use Error;

const OPERATORS = ['+', '-', '*'];
const RULES = 'What is the result of the expression?';

function getExpressionResult(string $operator, int $leftOperand, int $rightOperand): int
{
    switch ($operator) {
        case '+':
            return $leftOperand + $rightOperand;
        case '-':
            return $leftOperand - $rightOperand;
        case '*':
            return $leftOperand * $rightOperand;
        default:
            throw new Error("Unknown operator: {$operator}");
    }
}

function formatExpression(string $operator, int $leftOperand, int $rightOperand): string
{
    return "{$leftOperand} {$operator} {$rightOperand}";
}

function getCalcGame(): array
{
    $game = function () {
        $leftOperand = rand(1, 10);
        $rightOperand = rand(1, 10);
        $operator = OPERATORS[array_rand(OPERATORS)];

        $question = formatExpression($operator, $leftOperand, $rightOperand);
        $answer = getExpressionResult($operator, $leftOperand, $rightOperand);
        return [$question, $answer];
    };

    return [RULES, $game];
}
