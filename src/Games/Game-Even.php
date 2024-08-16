<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\welcomeAndGetUserName;
use function BrainGames\Engine\startGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;

function isEvenNumber(int $number): string
{
    if ($number % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}


function gameBrainEven()
{
    $countRounds = 3;
    $maxRandomNumber = 100;
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $roundNumber = 1;
    $gameResult = true;
    $nameOfGamer = welcomeAndGetUserName($gameDescription);
    while ($roundNumber <= $countRounds && $gameResult) {
        $randomNumber = strval(random_int(1, $maxRandomNumber));
        $gameResult = startGameAndGetResult($randomNumber, isEvenNumber($randomNumber));
        $roundNumber += 1;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
