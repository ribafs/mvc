<?php

// DIRECTORY_SEPARATOR adiciona uma barra ao final do path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

// Configura uma constante que manipula a pasta do projeto - 'src', como '/var/www/html/mini-framework2/src'.
define('APP', ROOT . 'src' . DIRECTORY_SEPARATOR);

// Este é o auto-loader para as dependências do Composer (para carregar ferramentas para seu projeto execute: composer update).
require_once ROOT . 'vendor/autoload.php';

// Carregar as configurações da aplicação (error reporting etc.)
require_once APP . 'config.php';

// Carregar a classe Router
use Mini\Core\Router;

// Iniciar a aplicação através do Router
$app = new Router();
