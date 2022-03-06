<?php

class View{

	public function render($name){
		require_once BASE_PATH . '/views/header.php';
		require_once BASE_PATH . '/views/' . $name .'.php';
		require_once BASE_PATH . '/views/footer.php';
	}
}
