<?php
namespace Core;

class View
{
	public function render(Page $page)
	{
		return $this->renderView($page);
	}

	private function renderView(Page $page)
	{
		if ($page->view) {
			$viewPath = $_SERVER['DOCUMENT_ROOT'] . "/project/views/{$page->view}.php";

			if (file_exists($viewPath)) {
				ob_start();
				$data = $page->data;
				extract($data);
				include $viewPath;
				return ob_get_clean();
			} else {
				echo "Не найден файл с представлением по пути $viewPath";
				die();
			}
		}
	}
}
