<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\prompt;

const COUNTQUESTIONS = 3;


function StartGame($gameDescription, $questions)
{
    $countRightAnswer = 0;
    line('Welcome to the Brain Games!');
    $nameOfGamer = prompt('May I have your name?', false, $marker = ' ');
    line('Hello, %s!', $nameOfGamer);
    line($gameDescription);
    for ($i = 0; $i <= COUNTQUESTIONS - 1; $i++) {
        line('Question: %s', $questions[$i][0]);
        $userAnswer = prompt('Your answer');
        $rightAnswer = $questions[$i][1];
        if ($userAnswer === $rightAnswer) {
            $countRightAnswer += 1;
            line('Correct!');
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'", $userAnswer, $rightAnswer);
            line("Let's try again, %s!", $nameOfGamer);
            break;
        }
    }
    if ($countRightAnswer === COUNTQUESTIONS) {
        line("Congratulations, %s!", $nameOfGamer);
    }
}
