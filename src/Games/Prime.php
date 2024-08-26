<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\playGame;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MAX_RANDOM_NUMBER = 25;

function isPrimeNumber(int $number): bool
{
    if ($number === 1) {
        return false;
    }
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

function getPrimeQuestion()
{
    $randomNumber = random_int(1, MAX_RANDOM_NUMBER);
    if (isPrimeNumber($randomNumber)) {
        $rightAnswer = 'yes';
    } else {
        $rightAnswer = 'no';
    }
    return [strval($randomNumber), $rightAnswer];
}

function playPrime()
{
    playGame(GAME_DESCRIPTION, "BrainGames\Games\Prime\getPrimeQuestion");
}
