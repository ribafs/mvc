## Estrutura do arquivo config.php

Este arquivo contém o principal de configurações do aplicativo,
configuração do banco e várias constantes

/src/config/config.php

```php
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
// Controller and action defaults - a ser implementado na Router
define('CONTROLLER', array('customers','index'));
define('APP_TITTLE', 'Mini Framework');
define('CONTROLLER_DEFAULT', 'Customers');

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql'); // mysql or pgsql
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'mvc');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_PORT', '3306');// 3306 or 5432
define('DB_CHARSET', 'utf8mb4');

```

Veja que podemos mudar o nome da pasta de entrada para outro nome diferente de public.

Também temos opção para ambientes entre outras.

