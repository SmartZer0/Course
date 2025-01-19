<?php
namespace Project\Controllers;

use Core\Controller;
use Project\Models\User;

class AuthController extends Controller
{
    protected string $title;

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->getUserByEmailAndPassword($email, $password);

            if ($user) {
                session_start();
                $_SESSION['auth'] = true;
                $_SESSION['user_id'] = $user['user_id'];
                header('Location: /home');
                exit;
            } else {
                $this->title = 'Авторизация';
                return ['view' => 'auth/login', 'data' => ['title' => $this->title, 'error' => 'Неверный email или пароль']];
            }
        } else {
            $this->title = 'Авторизация';
            return ['view' => 'auth/login', 'data' => ['title' => $this->title]];
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /auth/login');
        exit;
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $userModel = new User();
            $result = $userModel->addUser($firstName, $lastName, $email, $password, $role);

            if ($result) {
                header('Location: /auth/login');
                exit;
            } else {
                $this->title = 'Регистрация';
                return ['view' => 'auth/register', 'data' => ['title' => $this->title, 'error' => 'Ошибка при регистрации пользователя']];
            }
        } else {
            $this->title = 'Регистрация';
            return ['view' => 'auth/register', 'data' => ['title' => $this->title]];
        }
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
