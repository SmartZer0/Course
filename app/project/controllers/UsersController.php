<?php
namespace Project\Controllers;

use Core\Controller;
use Project\Models\User;

class UsersController extends Controller
{
    protected string $title;

    public function index()
    {
        $userModel = new User();
        $users = $userModel->getAllUsers();

        $this->title = 'Пользователи';
        return ['view' => 'users/index', 'data' => ['users' => $users, 'title' => $this->title]];
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
