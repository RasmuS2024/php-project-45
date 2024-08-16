<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\welcomeAndGetUserName;
use function BrainGames\Engine\startGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;

function getRandomCalc()
{
    $minNumber = 1;
    $maxNumber1 = 20;
    $maxNumber2 = 10;
    $operationTypes = ['+', '-', '*'];
    $operation = $operationTypes[random_int(0, count($operationTypes) - 1)];
    $firstNumber = random_int($minNumber, $maxNumber1);
    $secondNumber = random_int($minNumber, $maxNumber2);
    switch ($operation) {
        case "+":
            $calcAnswer = strval($firstNumber + $secondNumber);
            break;
        case "-":
            $calcAnswer = strval($firstNumber - $secondNumber);
            break;
        case "*":
            $calcAnswer = strval($firstNumber * $secondNumber);
            break;
    }
    return ["{$firstNumber} {$operation} {$secondNumber}", $calcAnswer];
}

function gameBrainCalc()
{
    $countRounds = 3;
    $gameDescription = 'What is the result of the expression?';
    $nameOfGamer = welcomeAndGetUserName($gameDescription);
    $roundNumber = 1;
    $gameResult = true;
    while ($roundNumber <= $countRounds && $gameResult) {
        [$question, $rightAnswer] = getRandomCalc();
        $gameResult = startGameAndGetResult($question, $rightAnswer);
        $roundNumber += 1;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
