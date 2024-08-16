<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function welcomeAndGetUserName($gameDescription)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', false, $marker = ' ');
    line('Hello, %s!', $name);
    line($gameDescription);
    return $name;
}

function startGameAndGetResult($question, $rightAnswer)
{
    line('Question: %s', $question);
    $gamerAnswer = prompt('Your answer');
    if ($gamerAnswer === $rightAnswer) {
        line('Correct!');
        return true;
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $gamerAnswer, $rightAnswer);
        return false;
    }
}

function showResultAndBye($nameOfGamer, $gameResult)
{
    if ($gameResult) {
        line("Congratulations, %s!", $nameOfGamer);
    } else {
        line("Let's try again, %s!", $nameOfGamer);
    }
}
