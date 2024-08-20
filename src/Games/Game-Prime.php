<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\welcomeAndGetUserName;
use function BrainGames\Engine\startGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;

const GAMEDESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const COUNTROUNDS = 3;
const MAXRANDOMNUMBER = 25;

function isPrimeNumber(int $number): bool
{
    if ($number === 2) {
        return true;
    }
    if ($number % 2 === 0) {
        return false;
    }
    $i = 3;
    $max_factor = (int)sqrt($number);
    while ($i <= $max_factor) {
        if ($number % $i === 0) {
            return false;
        }
        $i += 2;
    }
    return true;
}


function gameBrainPrime()
{
    $roundNumber = 1;
    $gameResult = true;
    $nameOfGamer = welcomeAndGetUserName(GAMEDESCRIPTION);
    while ($roundNumber <= COUNTROUNDS && $gameResult) {
        $randomNumber = random_int(1, MAXRANDOMNUMBER);
        if (isPrimeNumber($randomNumber)) {
            $rightAnswer = 'yes';
        } else {
            $rightAnswer = 'no';
        }
        $gameResult = startGameAndGetResult(strval($randomNumber), $rightAnswer);
        $roundNumber++;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
