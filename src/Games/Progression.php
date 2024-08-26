<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\playGame;

const GAME_DESCRIPTION = 'What number is missing in the progression?';
const MAX_NUMBER = 20;
const MAX_NUMBER_PROGRESSION = 10;
const COUNT_PROGRESSION = 10;

function getProgressionQuestion()
{
    $progression = [];
    $progression[] = strval(random_int(1, MAX_NUMBER));
    $numberProgression = random_int(1, MAX_NUMBER_PROGRESSION);
    $rightAnswer = '';
    $progressionAnswerNumber = random_int(2, COUNT_PROGRESSION);
    for ($i = 2; $i <= COUNT_PROGRESSION; $i++) {
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

function playProgression()
{
    playGame(GAME_DESCRIPTION, 'BrainGames\Games\Progression\getProgressionQuestion');
}
