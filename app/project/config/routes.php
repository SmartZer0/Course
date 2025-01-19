<?php
use \Core\Route;

return [
	new Route('/auth/login', 'auth', 'login'),
	new Route('/auth/logout', 'auth', 'logout'),
	new Route('/auth/register', 'auth', 'register'),
	new Route('/home', 'home', 'index'),
	new Route('/users', 'users', 'index'),
	new Route('/error/', 'error', 'index'),
	new Route('/error/notFound/', 'error', 'notFound'),
	new Route('/profile', 'profile', 'index'),
	new Route('/statistics', 'statistics', 'index'),
	new Route('/courses', 'course', 'index'),
	new Route('/create_test', 'createTest', 'index'),
	new Route('/create_test/create', 'createTest', 'create'),
	new Route('/test/:test_id', 'test', 'showTest'),
	new Route('/submit_test/:testId', 'test', 'submit'), // Отправка результатов теста
];
