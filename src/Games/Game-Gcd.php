<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\welcomeAndGetUserName;
use function BrainGames\Engine\startGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;

function getGcd(int $number1, int $number2)
{
    while ($number2 != 0) {
        $temp = $number2;
        $number2 = $number1 % $number2;
        $number1 = $temp;
    }
    return $number1;
}


function gameBrainGcd()
{
    $countRounds = 3;
    $minNumber = 1;
    $maxNumber = 20;
    $roundNumber = 1;
    $gameResult = true;
    $gameDescription = 'Find the greatest common divisor of given numbers.';
    $nameOfGamer = welcomeAndGetUserName($gameDescription);
    while ($roundNumber <= $countRounds && $gameResult) {
        $firstNumber = random_int($minNumber, $maxNumber);
        $secondNumber = random_int($minNumber, $maxNumber);
        $question = "{$firstNumber} {$secondNumber}";
        $rightAnswer = strval(getGcd($firstNumber, $secondNumber));
        $gameResult = startGameAndGetResult($question, $rightAnswer);
        $roundNumber += 1;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
