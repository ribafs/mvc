<?php

namespace Core;

define('DS', DIRECTORY_SEPARATOR);

// Captura o path completo do aplicativo. DIRECTORY_SEPARATOR adiciona uma barra ao final do path
define('ROOT', dirname(__DIR__) . DS);

// Captura a pasta do projeto: path full mais src, como '/var/www/html/mini-framework2/src'.
define('APP', ROOT . 'app' . DS);
define('CORE', ROOT . 'core' . DS);

// Este é o auto-loader para as dependências do Composer (para carregar ferramentas para seu projeto execute: composer update).
require_once ROOT . 'vendor/autoload.php';

// Carregar as configurações da aplicação (error reporting etc.)
require_once APP . 'config.php';

// Carregar a classe Router
use Core\Router;

// Iniciar a aplicação através do Router
$app = new Router();


