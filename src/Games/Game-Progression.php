<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\welcomeAndGetUserName;
use function BrainGames\Engine\startGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;

function getProgressionQuestion()
{
    $progression = [];
    $maxNumber = 20;
    $progression[] = strval(random_int(1, $maxNumber));
    $maxNumberProgression = 10;
    $numberProgression = random_int(1, $maxNumberProgression);
    $countProgression = 10;
    $rightAnswer = '';
    $progressionAnswerNumber = random_int(2, $countProgression);
    for ($i = 2; $i <= $countProgression; $i++) {
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
    $countRounds = 3;
    $roundNumber = 1;
    $gameResult = true;
    $gameDescription = 'What number is missing in the progression?';
    $nameOfGamer = welcomeAndGetUserName($gameDescription);
    while ($roundNumber <= $countRounds && $gameResult) {
        [$question, $rightAnswer] = getProgressionQuestion();
        $gameResult = startGameAndGetResult($question, $rightAnswer);
        $roundNumber += 1;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
