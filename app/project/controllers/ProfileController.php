<?php
namespace Project\Controllers;

use Core\Controller;
use Project\Models\User;

class ProfileController extends Controller
{
    protected string $title;

    public function index()
    {
        session_start();
        if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
            header('Location: /auth/login');
            exit;
        }

        $userModel = new User();
        $user = $userModel->getUserById($_SESSION['user_id']);

        $this->title = 'Профиль';
        return ['view' => 'profile/index', 'data' => ['user' => $user, 'title' => $this->title]];
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
