<?php
namespace Project\Controllers;

use Core\Controller;
use Project\Models\Test;
use Project\Models\Question;

class TestController extends Controller
{
    protected string $title;

    public function showTest($testId)
    {

        $testID = (int) $testId['test_id'];  // Преобразуем только значение из массива

        if ($testID <= 0) {
            header('Location: /error/notFound');
            exit;
        }

        $testModel = new Test();
        $test = $testModel->getTestById($testID);

        if (!$test) {
            header('Location: /error/notFound');
            exit;
        }

        $this->title = 'Тест: ' . ($test['title']['name'] ?? 'Без названия');


        $questionModel = new Question();
        $questions = $questionModel->getAllQuestionsByTestId($testID);

        return [
            'view' => 'tests/index',
            'data' => [
                'test' => $test,
                'questions' => $questions,
                'title' => $this->title,
            ],
        ];
    }

    public function getTitle(): string
    {
        if ($this->title === null) {
            $this->title = 'Default Title'; // Ленивая инициализация
        }
        return $this->title;
    }

    public function submit($testId)
    {
        session_start();
        $userId = $_SESSION['user_id'] ?? null;

        if (!$userId) {
            die("Ошибка: Пользователь не авторизован.");
        }

        // Если testId приходит как массив, извлекаем значение из массива (например, из POST)
        $testId = $_POST['testId'];
        $testId = (int) $testId;

        $questionModel = new Question();
        $questions = $questionModel->getAllQuestionsByTestId($testId);

        if (empty($questions)) {
            die("Ошибка: Вопросы для теста не найдены.");
        }

        $userAnswerModel = new \Project\Models\UserAnswer();
        $resultModel = new \Project\Models\Result();
        $statisticsModel = new \Project\Models\UserStatistics();

        $correctAnswers = 0;
        $totalQuestions = count($questions);

        foreach ($questions as $question) {
            $questionId = $question['question_id'];
            $userAnswer = $_POST['answer_' . $questionId] ?? '';
            $correctAnswer = $question['correct_answer'];

            // Сравнение ответов
            if (strtolower(trim($userAnswer)) === strtolower(trim($correctAnswer))) {
                $correctAnswers++; // Например, 10 баллов за правильный ответ
            }

            // Сохранение ответа пользователя
            $userAnswerModel->addUserAnswer($userId, $questionId, $userAnswer);
        }

        // Рассчет результата в процентах
        $score = round(($correctAnswers / $totalQuestions) * 100);

        // Сохранение результата
        $resultModel->addResult($userId, $testId, $score);

        // Обновление статистики пользователя
        $courseId = $this->getCourseIdByTestId($testId);
        $topic = $this->getTopicByTestId($testId);
        $this->updateUserStatistics($userId, $courseId, $topic, $score);

        // Перенаправление на страницу результатов
        header("Location: /statistics");
        exit;
    }

    // Получение ID курса по ID теста
    private function getCourseIdByTestId($testId)
    {
        $testModel = new \Project\Models\Test();
        $test = $testModel->getTestById($testId);
        return $test['course_id'] ?? null;
    }

    // Получение темы по ID теста
    private function getTopicByTestId($testId)
    {
        $testModel = new \Project\Models\Test();
        $test = $testModel->getTestById($testId);
        return $test['topic'] ?? 'Неизвестная тема';
    }

    // Обновление статистики пользователя
    private function updateUserStatistics($userId, $courseId, $topic, $score)
    {
        $statisticsModel = new \Project\Models\UserStatistics();
        $statisticsModel->updateStatistics($userId, $courseId, $topic, $score);
    }
}