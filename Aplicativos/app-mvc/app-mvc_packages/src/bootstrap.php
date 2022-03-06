<?php

declare(strict_types = 1);

/**
 * MVC-APP - an extremely simple naked PHP application
 *
 * @package mvc
 * @author Panique
 * @link http://www.php-mini.com
 * @link https://github.com/panique/mini/
 * @license http://opensource.org/licenses/MIT MIT License
 */

/**
 * Now MVC-APP work with namespaces + composer's autoloader (PSR-4)
 *
 * @author Joao Vitor Dias <joaodias@noctus.org>
 *
 * For more info about namespaces plase @see http://php.net/manual/en/language.namespaces.importing.php
 */

// set a constant that holds the project's folder path, like "/var/www/".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'src' . DIRECTORY_SEPARATOR);

// This is the auto-loader for Composer-dependencies (to load tools into your project).
require_once ROOT . 'vendor/autoload.php';

// load application config (error reporting etc.)
require_once APP . 'config/config.php';

/**
* Register the error handler
*/
$whoops = new \Whoops\Run;

if (ENVIRONMENT !== 'production') {
// Configure the PrettyPageHandler:
$errorPage = new Whoops\Handler\PrettyPageHandler();
 
$errorPage->setPageTitle("Algo errado aqui!"); // Set the page's title
$errorPage->setEditor("sublime");         // Set the editor used for the "Open" link
// Algumas informações extras
$errorPage->addDataTable("Informações Extras", array(
      "stuff"     => 123,
      "foo"       => "bar",
      "useful_id" => "baloney"
));
} else {
    $whoops->pushHandler(function($e){
        echo 'Todo: Friendly error page and send an email to the developer';
    });
}
 
$whoops->pushHandler($errorPage);
$whoops->register();
 
// Descomentar para lançar o Whoops
//throw new RuntimeException("Verifique detalhes!");
// load application class
use Mvc\Core\Router;

// start the application
$app = new Router();
