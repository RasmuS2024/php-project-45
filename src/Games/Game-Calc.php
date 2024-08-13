<?php

namespace BrainGames\Game\Calc;

use function BrainGames\Engine\WelcomeAndGetUserName;
use function BrainGames\Engine\StartGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;


function GameBrainCalc()
{
    $countRounds = 3;
    $gameDescription = 'What is the result of the expression?';
    $nameOfGamer = WelcomeAndGetUserName($gameDescription);
    $minNumber = 1;
    $maxNumber1 = 20;
    $maxNumber2 = 10;
    $roundNumber = 1;
    $gameResult = true;
    $operationTypes = ['+', '-', '*'];
    while ($roundNumber <= $countRounds && $gameResult) {
        $operation = $operationTypes[random_int(0, 2)];
        $firstNumber = random_int($minNumber, $maxNumber1);
        $secondNumber = random_int($minNumber, $maxNumber2);
        switch ($operation) {
            case "+":
                $calcAnswer = $firstNumber + $secondNumber;
                break;
            case "-":
                $calcAnswer = $firstNumber - $secondNumber;
                break;
            case "*":
                $calcAnswer = $firstNumber * $secondNumber;
                break;
        }
        $calcQuestion = strval($firstNumber) . " " . $operation . " " . strval($secondNumber);
        $rightAnswer = strval($calcAnswer);
        $gameResult = StartGameAndGetResult($calcQuestion, $rightAnswer);
        $roundNumber += 1;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
