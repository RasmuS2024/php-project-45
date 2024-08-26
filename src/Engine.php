<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_ROUNDS = 3;

function putQuestionAndGetResult(string $question, string $rightAnswer)
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

function showResultAndBye(string $nameOfGamer, bool $gameResult)
{
    if ($gameResult) {
        line("Congratulations, %s!", $nameOfGamer);
    } else {
        line("Let's try again, %s!", $nameOfGamer);
    }
}

function playGame(string $gameDescription, string $gameFunction)
{
    line('Welcome to the Brain Games!');
    $nameOfGamer = prompt('May I have your name?', false, $marker = ' ');
    line('Hello, %s!', $nameOfGamer);
    line($gameDescription);
    $roundNumber = 1;
    $gameResult = true;
    while ($roundNumber <= COUNT_ROUNDS && $gameResult) {
        [$question, $rightAnswer] = call_user_func($gameFunction);
        $gameResult = putQuestionAndGetResult($question, $rightAnswer);
        $roundNumber++;
    }
    showResultAndBye($nameOfGamer, $gameResult);
}
