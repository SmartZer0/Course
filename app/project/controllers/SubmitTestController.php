<?php
/*namespace Project\Controllers;

use Core\Controller;
use Project\Models\UserAnswer;
use Project\Models\Result;
use Project\Models\UserStatistics;

class SubmitTestController extends Controller
{
    protected string $title;

    public function submit($testId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $userId = $_SESSION['user_id'];
            $answers = $_POST['answers'];

            $userAnswerModel = new UserAnswer();
            $resultModel = new Result();
            $userStatisticsModel = new UserStatistics();

            $correctAnswersCount = 0;
            $totalQuestions = count($answers);

            foreach ($answers as $questionId => $answer) {
                $userAnswerModel->addAnswer($userId, $questionId, $answer);
                // Здесь можно добавить проверку правильности ответа и увеличить счетчик правильных ответов
                // $correctAnswersCount++;
            }

            $score = ($correctAnswersCount / $totalQuestions) * 100;
            $resultModel->addResult($userId, $testId, $score);
            $userStatisticsModel->addStatistics($userId, $testId, 'Test Result', $score);

            header('Location: /profile');
            exit;
        }
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
