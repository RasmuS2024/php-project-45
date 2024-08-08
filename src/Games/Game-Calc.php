<?php

//namespace BrainGames\Games;

function GameBrainCalc()
{
    $minRandomNumber = 1;
    $maxRandomNumber1 = 20;
    $maxRandomNumber2 = 10;
    $operationTypes = ['+', '-', '*'];
    $gameDescription = 'What is the result of the expression?';
    $questions = [];
    for ($i = 0; $i <= COUNTQUESTIONS - 1; $i++) {
        $operation = $operationTypes[random_int(1, 2)];
        $firstNumber = random_int($minRandomNumber, $maxRandomNumber1);
        $secondNumber = random_int($minRandomNumber, $maxRandomNumber2);
        switch ($operation) {
            case "+":
                $calcAnswer = $firstNumber + $secondNumber;
                break;
            case "-":
                $calcAnswer = $firstNumber - $secondNumber;
                break;
            case "*":
                $calcAnswer = $firstNumber * $secondNumber;
                break;
        }
        $calcQuestion = strval($firstNumber) . " " . $operation . " " . strval($secondNumber);
        $rightAnswer = strval($calcAnswer);
        $questions[] = [$calcQuestion, $rightAnswer];
    }
        StartGame($gameDescription, $questions);
}
