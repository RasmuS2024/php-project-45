<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\welcomeAndGetUserName;
use function BrainGames\Engine\startGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;

const GAMEDESCRIPTION = 'What number is missing in the progression?';
const COUNTROUNDS = 3;
const MAXNUMBER = 20;
const MAXNUMBERPROGRESSION = 10;
const COUNTPROGRESSION = 10;

function getProgressionQuestion()
{
    $progression = [];
    $progression[] = strval(random_int(1, MAXNUMBER));
    $numberProgression = random_int(1, MAXNUMBERPROGRESSION);
    $rightAnswer = '';
    $progressionAnswerNumber = random_int(2, COUNTPROGRESSION);
    for ($i = 2; $i <= COUNTPROGRESSION; $i++) {
        if ($i !== $progressionAnswerNumber) {
            $progression[] = strval((int)$progression[array_key_last($progression)] + $numberProgression);
        } else {
            $rightAnswer = strval((int)$progression[array_key_last($progression)] + $numberProgression);
            $progression[] = '..';
            $progression[] = strval((int)$rightAnswer + $numberProgression);
            $i++;
        }
    }
    return [implode(' ', $progression), $rightAnswer];
}

function gameBrainProgression()
{
    $roundNumber = 1;
    $gameResult = true;
    $nameOfGamer = welcomeAndGetUserName(GAMEDESCRIPTION);
    while ($roundNumber <= COUNTROUNDS && $gameResult) {
        [$question, $rightAnswer] = getProgressionQuestion();
        $gameResult = startGameAndGetResult($question, $rightAnswer);
        $roundNumber++;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
