<?php
namespace Core;

class Dispatcher
{
	public function getPage(Track $track)
	{
		$className = ucfirst($track->controller) . 'Controller';
		$fullName = "\\Project\\Controllers\\$className";

		try {
			$controller = new $fullName;

			if (method_exists($controller, $track->action)) {
				$result = $controller->{$track->action}($track->params);

				if (is_array($result) && isset($result['view']) && isset($result['data'])) {
					return new Page('default', $controller->getTitle(), $result['view'], $result['data']);
				} else {
					return new Page('default', 'Default Page');
				}
			} else {
				echo "Метод <b>{$track->action}</b> не найден в классе $fullName.";
				die();
			}
		} catch (\Exception $error) {
			echo $error->getMessage();
			die();
		}
	}
}
