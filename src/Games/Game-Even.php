<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\WelcomeAndGetUserName;
use function BrainGames\Engine\StartGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;

function isEvenNumber($number)
{
    if ($number % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}


function GameBrainEven()
{
    $countRounds = 3;
    $maxRandomNumber = 100;
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $roundNumber = 1;
    $gameResult = true;
    $nameOfGamer = WelcomeAndGetUserName($gameDescription);
    while ($roundNumber <= $countRounds && $gameResult) {
        $randomNumber = strval(random_int(1, $maxRandomNumber));
        $gameResult = StartGameAndGetResult($randomNumber, isEvenNumber($randomNumber));
        $roundNumber += 1;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
