<?php

namespace BrainGames\Games;

function isEvenNumber($number)
{
    if ($number % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}


function GameBrainEven()
{
    $countQuestions = 3;
    $maxRandomNumber = 100;
    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questions = [];
    for ($i = 0; $i <= COUNTQUESTIONS - 1; $i++) {
        $randomNumber = strval(random_int(1, $maxRandomNumber));
        $questions[] = [$randomNumber, isEvenNumber($randomNumber)];
    }
    StartGame($gameDescription, $questions);
}
