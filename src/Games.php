<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\prompt;

function WelcomeAndWhatIsYourNname()
{
    line('Welcome to the Brain Games!');
    $nameOfGamer = prompt('May I have your name?');
    line('Hello, %s!', $nameOfGamer);
    return $nameOfGamer;
}

function isEvenNumber($number)
{
    if ($number % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}

function ParityCheckGame()
{
    $name = WelcomeAndWhatIsYourNname();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $correctAnswersCount = 0;
    for ($i = 1; $i <= 3; $i++) {
        $randomNumber = random_int(1, 100);
        line("Question: {$randomNumber}");
        $answer = readline("Your answer: ");
        /*
        $answerNot = match ($answer) {
            'yes' => 'no',
            'no' => 'yes',
            default => '',
        };*/

        /*
        $checkAnswer = ($answer === isEvenNumber($randomNumber)) ?
         "Correct!" :
         "'{$answer}' is wrong answer ;(. Correct answer was {$answerNot}.\nLet's try again, {$name}!";
        */
        $correctAnswer = isEvenNumber($randomNumber);
        if ($answer === $correctAnswer) {
            $correctAnswersCount += 1;
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was {$correctAnswer}.\nLet's try again, {$name}!");
            break;
        }
        //line($checkAnswer);
    }
    if ($correctAnswersCount === 3) {
        line("Congratulations, {$name}!");
    }
}
