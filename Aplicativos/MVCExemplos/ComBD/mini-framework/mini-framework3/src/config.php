<?php

/**
 * Configuração para: Error reporting
 * Útil para mostrar todos os pequenos problemas durante o desenvolvimento, mas mostra apenas erros graves na produção
 */
define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

/**
 * Configuração para a: URL
 * Aqui, detectamos automaticamente o URL de seus aplicativos e a subpasta potencial. Funciona perfeitamente na maioria dos servidores e em
 * ambientes de desenvolviimento locais (como XAMPP, WAMP, MAMP, etc.). Não mude isso, a menos que saiba o que está fazendo.
 *
 * URL_PUBLIC_FOLDER:
 * A pasta que é visível ao público, os usuários só terão acesso a essa pasta, para que ninguém possa ver
 * "/src" ou outra pasta dentro do seu aplicativo ou chame qualquer outro arquivo .php que não seja index.php dentro de "/ public".
 *
 * URL_PROTOCOL:
 * O protocolo. Não mude a menos que saiba exatamente o que faz. Isso define a parte do protocolo da URL, em versões mais antigas.
 * Agora o protocolo é independente de ser http ou https, '//' é usado, que reconhece automaticamente o protocolo.
 *
 * O domínio. Não mude a menos que saiba exatamente o que faz.
 * Se seu projeto for executado com http e https, altere para '//'
 *
 * URL_SUB_FOLDER:
 * A subpasta. Deixe como está, mesmo que você não use uma subpasta (então será apenas "/").
 *
 * URL:
 * O URL final detectado automaticamente (criado através dos segmentos acima). Se você não quiser usar a detecção automática,
 * substitua esta linha por URL completo (e subpasta) e uma barra final.
 */

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);
// Controller and action defaults - implementados no Router
define('CONTROLLER', array('clientes','index'));
define('SRC_TITTLE', 'Mini Framework MVC 2');
define('CONTROLLER_DEFAULT', 'Clientes');

/**
 * Configuração para: Database
 */
define('DB_TYPE', 'mysql'); // mysql or pgsql
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'mvc');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_PORT', '3306');// 3306 or 5432
define('DB_CHARSET', 'utf8mb4');

