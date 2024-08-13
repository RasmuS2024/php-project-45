<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\WelcomeAndGetUserName;
use function BrainGames\Engine\StartGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;

function GetRandomCalc()
{
    $minNumber = 1;
    $maxNumber1 = 20;
    $maxNumber2 = 10;
    $operationTypes = ['+', '-', '*'];
    $operation = $operationTypes[random_int(0, 2)];
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

function GameBrainCalc()
{
    $countRounds = 3;
    $gameDescription = 'What is the result of the expression?';
    $nameOfGamer = WelcomeAndGetUserName($gameDescription);
    $roundNumber = 1;
    $gameResult = true;
    while ($roundNumber <= $countRounds && $gameResult) {
        [$question, $rightAnswer] = GetRandomCalc();
        $gameResult = StartGameAndGetResult($question, $rightAnswer);
        $roundNumber += 1;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
