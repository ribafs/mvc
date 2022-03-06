<?php
	
	define('APP', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR);
	
	require_once APP . 'config/config.php';

	require_once APP . 'core/View.php';
	require_once APP . 'core/Model.php';
	require_once APP . 'core/Controller.php';
	require_once APP . 'core/Session.php';
	require_once APP . 'core/CSRF.php';

	require_once APP . 'core/App.php';

	$app = new App();
?>