<?php
namespace Project\Controllers;

use Core\Controller;
use Project\Models\UserStatistics;

class StatisticsController extends Controller
{
    protected string $title;

    public function index()
    {
        session_start();
        if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
            header('Location: /auth/login');
            exit;
        }

        $userId = $_SESSION['user_id'];
        $statisticsModel = new UserStatistics();
        $statistics = $statisticsModel->getStatisticsWithCourseAndTopicByUserId($userId);

        $this->title = 'Статистика';
        return [
            'view' => 'statistics/index',
            'data' => ['statistics' => $statistics, 'title' => $this->title]
        ];
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
