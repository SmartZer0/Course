<?php
namespace Project\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    protected string $title;

    public function index()
    {
        $this->title = 'Главная';
        return ['view' => 'home', 'data' => ['title' => $this->title]];
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
