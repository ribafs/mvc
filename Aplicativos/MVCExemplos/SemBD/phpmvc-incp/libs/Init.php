<?php

class Init{

	public function __construct(){
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = explode('/', $url);

		if(empty($url[0])){
			require_once BASE_PATH . '/controllers/index.php';
			$index = new Index();
			$index->index();
			return false;
		}

		// Check if page exists
		$file = BASE_PATH . '/controllers/' . $url[0] . '.php';

		if(file_exists($file)){
		// Require file
		require_once $file;
		// Instantiate class
		$controller = new $url[0];

		// Check if method is set
		if(isset($url[2])){
			if(method_exists($controller, $url[1])){
				// Instantiate class, with specified method if it does exist
				$controller->{$url[1]}($url[2]);
			} else {
				$this->init_error('Method Does not exist');
			}
		} else {
			if(isset($url[1])){
				if(method_exists($controller, $url[1])){
					$controller->{$url[1]}();
				} else {
					$this->init_error('Method Does not Exist');
				}
			} else {
				// Render to view
				$controller->index();
			}
		}
			} else {
				// Log error to use
				$this->init_error('File does not exist');
			}
	}

	private function init_error($errors){
		require_once BASE_PATH . '/controllers/error.php';
		$error = new Error($errors);
		$error->index();
		return false;
	}
}
