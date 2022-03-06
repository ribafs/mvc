<?php
/**
 * -------------- Informações do Sistema -----------------
 */
define("TITLE_NAME", "Descompila");

/**
 * -------------- Tipo de Ambiente -----------------
 */

require 'environment.php';

$config = array();

if (ENVIRONMENT == 'development') {
    define("BASE_URL", "http://localhost/mini-framework-php/");
    $config['dbname'] = 'dbmercadinho';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {
    define("BASE_URL", "http://www.descompila.com/");
    $config['dbname'] = 'mvcbasico';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}
/**
 * -------------- Conexão com Banco de Dados -----------------
 */
global $db;

try {
    if ($db == null) {
        $db = new PDO("mysql:dbname={$config['dbname']};host={$config['host']}", $config['dbuser'], $config['dbpass']);
    }
} catch (PDOException $ex) {
    echo "ERRO: " . $ex->getMessage();
}

/**
 * -------------- Autoload - MVC -----------------
 */
spl_autoload_register(function($class) {
    if (file_exists("application/controllers/{$class}.php")) {
        require "application/controllers/{$class}.php";
    } elseif (file_exists("application/models/{$class}.php")) {
        require "application/models/{$class}.php";
    } elseif (file_exists("application/core/{$class}.php")) {
        require "application/core/{$class}.php";
    } elseif (file_exists("application/facade/{$class}.php")) {
        require "application/facade/{$class}.php";
    }
});

$core = new Core();
$core->run();
