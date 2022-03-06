<?php
define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);

define('CONTROLLER', array('clientes','index'));
define('APP_TITTLE', 'Framework MVC Simples');
define('CONTROLLER_DEFAULT', 'Clientes');

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql'); // mysql or pgsql
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'testes');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_PORT', '3306');// 3306 or 5432
define('DB_CHARSET', 'utf8mb4');

