<?php

// Define our base dirctory path
define('BASE_PATH', dirname(realpath(__FILE__)));
// Require config file
require_once BASE_PATH . '/config/config.php';

function __autoload($class){
	require_once BASE_PATH . "/libs/$class.php";
}

$init = new Init();

?>