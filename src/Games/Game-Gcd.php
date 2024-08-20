<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\welcomeAndGetUserName;
use function BrainGames\Engine\startGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;

const GAMEDESCRIPTION = 'Find the greatest common divisor of given numbers.';
const COUNTROUNDS = 3;
const MINNUMBER = 1;
const MAXNUMBER = 20;

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
    $roundNumber = 1;
    $gameResult = true;
    $nameOfGamer = welcomeAndGetUserName(GAMEDESCRIPTION);
    while ($roundNumber <= COUNTROUNDS && $gameResult) {
        $firstNumber = random_int(MINNUMBER, MAXNUMBER);
        $secondNumber = random_int(MINNUMBER, MAXNUMBER);
        $question = "{$firstNumber} {$secondNumber}";
        $rightAnswer = strval(getGcd($firstNumber, $secondNumber));
        $gameResult = startGameAndGetResult($question, $rightAnswer);
        $roundNumber++;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
