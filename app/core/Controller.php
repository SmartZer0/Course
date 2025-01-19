<?php
namespace Core;

class Controller
{
	protected string $title = '';

	public function render(string $view, array $data = [])
	{
		$page = new Page('default', $this->title, $view, $data);
		$view = new View();
		return $view->render($page);
	}

	public function getTitle(): string
	{
		return $this->title;
	}
}
