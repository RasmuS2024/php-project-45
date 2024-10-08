<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_ROUNDS = 3;

function welcomeToGameAndGetUserName()
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line('Hello, %s!', $userName);
    return $userName;
}

function putQuestionAndGetAnswer(string $question)
{
    line('Question: %s', $question);
    return prompt('Your answer');
}

function printResultOfQuestion(bool $result, string $gamerAnswer, string $rightAnswer, string $nameOfGamer)
{
    if ($result) {
        line('Correct!');
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $gamerAnswer, $rightAnswer);
        line("Let's try again, %s!', %s", $nameOfGamer);
    }
}

function playGame(string $gameDescription, callable $gameFunction)
{
    $nameOfGamer = welcomeToGameAndGetUserName();
    line($gameDescription);
    for ($i = 1; $i <= COUNT_ROUNDS; $i++) {
        [$question, $rightAnswer] = $gameFunction();
        $gamerAnswer = putQuestionAndGetAnswer($question);
        $resultOfQuestion = ($gamerAnswer === $rightAnswer);
        printResultOfQuestion($resultOfQuestion, $gamerAnswer, $rightAnswer, $nameOfGamer);
        if (!$resultOfQuestion) {
            return;
        }
    }
    line('Congratulations, %s!', $nameOfGamer);
}
