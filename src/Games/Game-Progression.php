<?php

namespace BrainGames\Game\Progression;

use function BrainGames\Engine\WelcomeAndGetUserName;
use function BrainGames\Engine\StartGameAndGetResult;
use function BrainGames\Engine\showResultAndBye;

function GetProgressionQuestion()
{
    $maxNumber = 20;
    $progression[] = strval(random_int(1, $maxNumber));
    $maxNumberProgression = 10;
    $numberProgression = random_int(1, $maxNumberProgression);
    $countProgression = 10;
    $progressionAnswerNumber = random_int(2, $countProgression);
    for ($i = 2; $i <= $countProgression; $i++) {
        if ($i !== $progressionAnswerNumber) {
            $progression[] = strval($progression[array_key_last($progression)] + $numberProgression);
        } else {
            $rightAnswer = strval($progression[array_key_last($progression)] + $numberProgression);
            $progression[] = '..';
            $progression[] = strval($rightAnswer + $numberProgression);
            $i++;
        }
    }
    return [implode(' ', $progression), $rightAnswer];
}

function GameBrainProgression()
{
    $countRounds = 3;
    $roundNumber = 1;
    $gameResult = true;
    $gameDescription = 'What number is missing in the progression?';
    $nameOfGamer = WelcomeAndGetUserName($gameDescription);
    while ($roundNumber <= $countRounds && $gameResult) {
        [$question, $rightAnswer] = GetProgressionQuestion();
        $gameResult = StartGameAndGetResult($question, $rightAnswer);
        $roundNumber += 1;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
