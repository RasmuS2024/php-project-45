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

function getQuestionResult(string $gamerAnswer, string $rightAnswer)
{
    return ($gamerAnswer === $rightAnswer) ? true : false;
}

function printResultOfQuestion(bool $result, string $gamerAnswer, string $rightAnswer)
{
    $result ? line('Correct!') : line("'%s' is wrong answer ;(. Correct answer was '%s'.", $gamerAnswer, $rightAnswer);
}

function showResultAndBye(string $nameOfGamer, int $round)
{
    if ($round === COUNT_ROUNDS + 1) {
        line('Congratulations, %s!', $nameOfGamer);
    }
    line('Let\'s try again, %s!', $nameOfGamer);
}

function playGame(string $gameDescription, string $gameFunction)
{
    $nameOfGamer = welcomeToGameAndGetUserName();
    line($gameDescription);
    for ($i = 1; $i <= COUNT_ROUNDS; $i++) {
        [$question, $rightAnswer] = $gameFunction();
        $userAnswer = putQuestionAndGetAnswer($question);
        $resultOfQuestion = getQuestionResult($userAnswer, $rightAnswer);
        printResultOfQuestion($resultOfQuestion, $userAnswer, $rightAnswer);
        if (!$resultOfQuestion) {
            break;
        }
    }
    showResultAndBye($nameOfGamer, $i);
}
