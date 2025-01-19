<?php
namespace Project\Controllers;

use Core\Controller;
use Project\Models\Test;
use Project\Models\Course;
use Project\Models\Question;
use Project\Models\User; // Импортируем модель User

class CreateTestController extends Controller
{
    protected string $title;

    public function index()
    {
        session_start();
        if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
            header('Location: /auth/login');
            exit;
        }

        // Получаем роль пользователя из базы данных
        $userModel = new User();
        $user = $userModel->getUserById($_SESSION['user_id']);

        // Проверяем существование ключа 'role'
        if (!isset($user['role'])) {
            error_log('Role not found for user with ID ' . $_SESSION['user_id']);
            header('Location: /courses');
            exit;
        }

        $userRole = $user['role'];

        // Проверяем роль пользователя
        if ($userRole !== 'Преподаватель') {
            header('Location: /courses');
            exit;
        }

        $courseModel = new Course();
        $courses = $courseModel->getAllCourses();

        $this->title = 'Создать тест';
        return ['view' => 'create_test/index', 'data' => ['courses' => $courses, 'title' => $this->title]];
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $courseId = $_POST['course_id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $questionTexts = $_POST['question_text'];
            $correctAnswers = $_POST['correct_answer'];

            $testModel = new Test();
            $testId = $testModel->addTest($courseId, $title, $description);

            $questionModel = new Question();
            for ($i = 0; $i < count($questionTexts); $i++) {
                $questionModel->addQuestion($testId, $questionTexts[$i], $correctAnswers[$i]);
            }

            header('Location: /courses');
            exit;
        }
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
