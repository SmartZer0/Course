<?php
namespace Project\Controllers;

use Core\Controller;

class ErrorController extends Controller
{
    public function index()
    {
        $this->title = 'Ошибка';
        return $this->render('error/index', ['title' => 'Ошибка']);
    }

    public function notFound()
    {
        $this->title = 'Страница не найдена';
        return $this->render('error/notFound', ['title' => 'Страница не найдена']);
    }
}
