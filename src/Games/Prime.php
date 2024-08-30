<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\playGame;

const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MAX_RANDOM_NUMBER = 25;

function isPrimeNumber(int $number): bool
{
    if ($number === 1 || $number % 2 === 0) {
        return false;
    }
    if ($number === 2) {
        return true;
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
    $rightAnswer = isPrimeNumber($randomNumber) ? 'yes' : 'no';
    return [(string)$randomNumber, $rightAnswer];
}

function playPrime()
{
    playGame(GAME_DESCRIPTION, 'BrainGames\Games\Prime\getPrimeQuestion');
}
