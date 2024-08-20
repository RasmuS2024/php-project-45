<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\welcomeAndGetUserName;
use function BrainGames\Engine\startGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;

const GAMEDESCRIPTION = 'What is the result of the expression?';
const COUNTROUNDS = 3;
const MINNUMBER = 1;
const MAXNUMBER1 = 20;
const MAXNUMBER2 = 10;

function getRandomCalc()
{
    $operationTypes = ['+', '-', '*'];
    $operation = $operationTypes[random_int(0, count($operationTypes) - 1)];
    $firstNumber = random_int(MINNUMBER, MAXNUMBER1);
    $secondNumber = random_int(MINNUMBER, MAXNUMBER2);
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
    $nameOfGamer = welcomeAndGetUserName(GAMEDESCRIPTION);
    $roundNumber = 1;
    $gameResult = true;
    while ($roundNumber <= COUNTROUNDS && $gameResult) {
        [$question, $rightAnswer] = getRandomCalc();
        $gameResult = startGameAndGetResult($question, $rightAnswer);
        $roundNumber++;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
