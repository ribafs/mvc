<?php

define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'src' . DIRECTORY_SEPARATOR);

require_once ROOT . 'vendor/autoload.php';
require_once APP . 'config/config.php';

// Iniciar a aplicação
use RibaFS\Core\Router;
$app = new Router();

