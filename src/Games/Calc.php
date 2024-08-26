<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\playGame;

const GAME_DESCRIPTION = 'What is the result of the expression?';
const MIN_NUMBER = 1;
const MAX_NUMBER1 = 20;
const MAX_NUMBER2 = 10;

function calculate(string $operation, int $number1, int $number2): int
{
    $result = 0;
    switch ($operation) {
        case "+":
            $result = $number1 + $number2;
            break;
        case "-":
            $result = $number1 - $number2;
            break;
        case "*":
            $result = $number1 * $number2;
            break;
    }
    return $result;
}

function getCalcQuestion()
{
    $operationTypes = ['+', '-', '*'];
    $operation = $operationTypes[random_int(0, count($operationTypes) - 1)];
    $firstNumber = random_int(MIN_NUMBER, MAX_NUMBER1);
    $secondNumber = random_int(MIN_NUMBER, MAX_NUMBER2);
    $calcAnswer = strval(calculate($operation, $firstNumber, $secondNumber));
    return ["{$firstNumber} {$operation} {$secondNumber}", $calcAnswer];
}

function playCalc()
{
    playGame(GAME_DESCRIPTION, 'BrainGames\Games\Calc\getCalcQuestion');
}
