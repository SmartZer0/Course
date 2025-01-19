<?php

use Core\View;
use Core\Page;
use Core\Dispatcher;
use Core\Track;


// Ваш код для запуска приложения
$dispatcher = new Dispatcher();

// Пример для метода login контроллера auth
$track = new Track('auth', 'login');

try {
    $page = $dispatcher->getPage($track);
    $view = new View();
    echo $view->render($page);
} catch (\Exception $e) {
    // Обработка ошибок
    $errorPage = new Page('default', 'Ошибка', 'error/index', ['error' => $e->getMessage()]);
    $view = new View();
    echo $view->render($errorPage);
}
