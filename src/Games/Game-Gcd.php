<?php

namespace BrainGames\Game\Gcd;

use function BrainGames\Engine\WelcomeAndGetUserName;
use function BrainGames\Engine\StartGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;

function GetGcd($number1, $number2)
{
    while ($number2 != 0) {
        $temp = $number2;
        $number2 = $number1 % $number2;
        $number1 = $temp;
    }
    return $number1;
}


function GameBrainGcd()
{
    $countRounds = 3;
    $minNumber = 1;
    $maxNumber = 20;
    $roundNumber = 1;
    $gameResult = true;
    $gameDescription = 'Find the greatest common divisor of given numbers.';
    $nameOfGamer = WelcomeAndGetUserName($gameDescription);
    while ($roundNumber <= $countRounds && $gameResult) {
        $firstNumber = random_int($minNumber, $maxNumber);
        $secondNumber = random_int($minNumber, $maxNumber);
        $question = "{$firstNumber} {$secondNumber}";
        $rightAnswer = strval(GetGcd($firstNumber, $secondNumber));
        $gameResult = StartGameAndGetResult($question, $rightAnswer);
        $roundNumber += 1;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
