<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\welcomeAndGetUserName;
use function BrainGames\Engine\startGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;

const GAMEDESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const COUNTROUNDS = 3;
const MAXRANDOMNUMBER = 100;
const MINNUMBER = 1;

function isEvenNumber(int $number): bool
{
    return $number % 2 === 0;
}


function gameBrainEven()
{
    $roundNumber = 1;
    $gameResult = true;
    $nameOfGamer = welcomeAndGetUserName(GAMEDESCRIPTION);
    while ($roundNumber <= COUNTROUNDS && $gameResult) {
        $randomNumber = random_int(MINNUMBER, MAXRANDOMNUMBER);
        if (isEvenNumber($randomNumber)) {
            $rightAnswer = 'yes';
        } else {
            $rightAnswer = 'no';
        }
        $gameResult = startGameAndGetResult(strval($randomNumber), $rightAnswer);
        $roundNumber++;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
