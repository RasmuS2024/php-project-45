<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\welcomeAndGetUserName;
use function BrainGames\Engine\startGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;

function isPrimeNumber($number)
{
    if ($number === 2) {
        return 'yes';
    }
    if ($number % 2 === 0) {
        return 'no';
    }
    $i = 3;
    $max_factor = (int)sqrt($number);
    while ($i <= $max_factor) {
        if ($number % $i === 0) {
            return 'no';
        }
        $i += 2;
    }
    return 'yes';
}


function gameBrainPrime()
{
    $countRounds = 3;
    $gameDescription = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $maxRandomNumber = 25;
    $roundNumber = 1;
    $gameResult = true;
    $nameOfGamer = welcomeAndGetUserName($gameDescription);
    while ($roundNumber <= $countRounds && $gameResult) {
        $randomNumber = strval(random_int(1, $maxRandomNumber));
        $gameResult = startGameAndGetResult($randomNumber, isPrimeNumber($randomNumber));
        $roundNumber += 1;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
