<?php

// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

// set a constant that holds the project's 'src' folder, like '/var/www/html/mini-fw/src'.
define('APP', ROOT . 'src' . DIRECTORY_SEPARATOR);

// This is the auto-loader for Composer-dependencies (to load tools into your project).
require_once ROOT . 'vendor/autoload.php';

// load application config (error reporting etc.)
require_once APP . 'config.php';

// load application class
use Mini\Core\Router;

// start the application
$app = new Router();
