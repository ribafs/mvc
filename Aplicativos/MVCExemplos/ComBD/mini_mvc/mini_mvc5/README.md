## Roteiro de criação de um aplicativo em PHP usando MVC

- Criei o diretório raiz: mvc_mini
- Criar o sub diretório /public
- Copiei o diretório public para src
- Copiei este .htaccess no raiz:

RewriteEngine On
RewriteBase /mvc_mini/

RewriteCond %{THE_REQUEST} /public/([^\s?]*) [NC]
RewriteRule ^ %1 [L,NE,R=302]

RewriteRule ^((?!public/).*)$ public/$1 [L,NC]

- Criei o .htaccess no /public:

RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-l
RewriteRule ^(.*)$ index.php?$1 [L,QSA]

- Criei um public/index.php provisório com:
<?php

echo 'OK';

Testei
http://localhost/mvc_mini

Funcionou bem.

- Criei o seguinte composer.json abaixo no raiz do aplicativo:

{
    "name": "panique/mini3",
    "description": "MINI MVC - um extremamente simples aplicativo em PHP usando MVC",
    "type": "project",
    "license": "MIT",
    "authors": [
        {
            "name": "Ribamar FS",
            "email": "ribafs@gmail.com"
        }
    ],
    "minimum-stability": "dev",
    "require": {},
    "autoload":
    {
        "psr-4":
        {
            "Mvc\\" : "src/"
        }
    }
}

- Executar no raiz:
composer dumpautoload
Obs: qualquer alteração no composer.json requer uma nova execução do comando acima

- Sobrescrever a linha com echo no public/index.php com:
require '../src/bootstrap.php';

- Criar o src/bootstrap.php contendo:

<?php
echo 'OK2';

- Chamar
http://localhost/mvc_mini

- Criar o src/config.php contendo:

<?php

define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}
define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', '//');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', str_replace(URL_PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));
define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER);
define('CONTROLLER', array('customers','index'));
define('CONTROLLER_DEFAULT', 'Clientes');
define('APP_TITTLE', 'Mini Framework by RibaFS');

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type etc.
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'testes');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_PORT', '3306');
define('DB_CHARSET', 'utf8mb4');

Vejamos a atual estrutura de diretórios

.htaccess
public/.htaccess
public/index.php
vendor/
src/
    config.php
    bootstrap.php

- Trocar a linha provisória do src/bootstrap.php por:

require_once '../vendor/autoload.php'; // Carrega o psr-4
require_once '../src/config.php';// Como bootstrap foi incluído pelo public/index.php, então seu código está no index.php, por isso esse require
print 'OK3';

Até aqui tudo bem.

- Em frente. Trocar o conteúdo do src/bootstrap.php por

<?php
// Define as duas constantes
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP', ROOT . 'src' . DIRECTORY_SEPARATOR);

require_once ROOT . 'vendor/autoload.php'; // Carrega o psr-4
require_once APP . 'config.php'; // Carrega as configurações

print 'OK3';

Vou seguir o mini3 mas tentando simplificar sempre. Algo que irei reduzir é a classe Router. Esta minha versão fica menos eficiente mas mais simples de entender.

- Criar a pasta src/Core e copiar para dentro dela a classe Router.php contendo:

<?php
declare(strict_types = 1);
namespace Mvc\Core;

class Router
{
    private $urlController = null;
    private $urlAction = null;
    private $urlParams = array();

    public function __construct()
    {
        $this->splitUrl();

        if (!$this->urlController) {
			$controllerDefault = '\\Mvc\\Controller\\' . CONTROLLER_DEFAULT . 'Controller';
			$page = new $controllerDefault;
            $page->index();

        } elseif (file_exists(APP . 'Controller/' . ucfirst($this->urlController) . 'Controller.php')) {
            $controller = '\\Mvc\\Controller\\' . ucfirst($this->urlController) . 'Controller';
            $this->urlController = new $controller();

            if (method_exists($this->urlController, $this->urlAction) && is_callable(array($this->urlController, $this->urlAction))) {
                if (!empty($this->urlParams)) {
                    call_user_func_array(array($this->urlController, $this->urlAction), $this->urlParams);
                } else {
                    $this->urlController->{$this->urlAction}();
                }

			// if none method is found
            } else {
                if (strlen($this->urlAction) == 0) {
                    $this->urlController->index();

				// otherwise fire ErrorController
                } else {
					$action = $this->urlAction;
					$contr = explode('\\',$controller);// Capture ucfirst($this->urlController) in [3]
                    $page = new \Mvc\Controller\ErrorController();
                    $page->index($contr[3],$action);
                }
            }

		// if none controller is found fire ErrorController
        } else {
			$controller = $this->urlController;
			$action = $this->urlAction;
            $page = new \Mvc\Controller\ErrorController();
            $page->index(ucfirst($controller).'Controller',$action);
        }
    }

    private function splitUrl()
    {
		// check if url is isset
        if (isset($_GET['url'])) {

            // split URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            $this->urlController = isset($url[0]) ? $url[0] : null;
            $this->urlAction = isset($url[1]) ? $url[1] : 'index';// era null

            // Remove controller and action from the split URL
            unset($url[0], $url[1]);

            // Rebase array keys and store the URL params
            $this->urlParams = array_values($url);
        }
    }
}


Vamos alterar bootstrap.php para que execute Router. Adicione ao final:

// Iniciar a aplicação
use Mvc\Core\Router;
$app = new Router();

- Chamar novamente pelo navegador
Ele agora reclamará a falta do controller Clientes.

Para simplificar as coisas criarei um controller apenas com o action/método index().

- Criar src/Controller/ClientesController.php contendo:

<?php

declare(strict_types = 1);

namespace Mvc\Controller;
use Mvc\Model\ClientesModel;
use Mvc\View\ClientesView;

class ClientesController
{

    public function index()
    {
        $Cliente = new ClientesModel();
        $todos = $Cliente->todosClientes();

		$view = new ClientesView();
		$view->index('clientes','index',$todos,'');
    }
}

Chamando novamente agora ele reclama do Model. Também criarei src/Model/ClientesModel.php contendo:

<?php
declare(strict_types = 1);

namespace Mvc\Model;
use Mvc\Core\Model;

class ClientesModel extends Model
{

    public function todosClientes()
    {
        $sql = 'SELECT id, nome, email FROM clientes ORDER BY id DESC';
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

}

Agora ele reclama do Core/Model.php. Criarei contendo:

<?php

declare(strict_types = 1);

namespace Mvc\Core;
use PDO;

class Model
{
    public $db = null;
    function __construct()
    {
        try {
            self::openDatabaseConnection();
        } catch (\PDOException $e) {
            exit('Erro ao conectar ao banco de dados.');
        }
    }

    private function openDatabaseConnection()
    {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

		$dsn = DB_TYPE . ':host=' . DB_HOST . ';port ='. DB_PORT . ';dbname=' . DB_NAME;// . $databaseEncodingenc;
        $this->db = new PDO($dsn , DB_USER, DB_PASS, $options);
    }
}

Agora ele reclama da view. Criarei src/View/ClientesView.php contendo:

<?php
// Used in methods from clientes to views

declare(strict_types = 1);

namespace Mvc\View;

class ClientesView
{

	public function index($controller, $action, $clientes, $total_clientes){

        require APP . 'template/_templates/header.php';
        require APP . 'template/'.$controller.'/'.$action.'.php';
        require APP . 'template/_templates/footer.php';
	}

}

Agora ele pede o template/_templates/header.php. Criarei src/template/_templates/header.php:

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=APP_TITTLE?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS from BootStrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="<?php echo URL; ?>css/custom.css" rel="stylesheet">                
</head>
<body>
    <div align="center"><h1><?=APP_TITTLE?></h1></div>
	<div class="container">
		<!-- MENU -->
		<nav class="navbar-expand bg-dark navbar-dark">
			<ul class="navbar-nav justify-content-center">
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo URL; ?>clientes">Clientes</a>
			  </li>
			</ul>
		</nav>
	</div>

Ao rodar novamente já aparece o título e o link de Clientes acima, mas reclamando reclamd de src/templare/clientes/index.php

<div class="container">
    <h2 class="text-center">Clientes</h2>
    <div>
        <br>        
        <b>Lista de Clientes (dados do model)</b>
        <table class="table table-hover table-stripped">
            <thead>
            <tr class="bg-gray">
                <td><b>ID</b></td>
                <td><b>Nome</b></td>
                <td><b>E-mail</b></td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($clientes as $cliente) { ?>
                <tr>
                    <td><?php if (isset($cliente->id)) echo htmlspecialchars($cliente->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($cliente->nome)) echo htmlspecialchars($cliente->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($cliente->email)) echo htmlspecialchars($cliente->email, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

Agora ao rodar já aparece a listagem, mas ao final r eclama do src/template/_templates/footer.php. Criei assim:

<div class="container bg-gray">
    <div align="center">
        Este aplicativo foi desenvolvido adaptado do <a href="https://github.com/panique/mini3">MINI3</a> - adaptação de Ribamar FS</a>.
    </div>
</div>
</body>
</html>

Agora rodou sem erro.

Testando rotas

Criei src/Controller/ErrorController.php contendo:

<?php

declare(strict_types = 1);
namespace Mvc\Controller;

class ErrorController
{
  
    public function index($controller = null, $action = null)
    {
        // load views
        require APP . 'template/_templates/header.php';
        require APP . 'template/error/index.php';
        require APP . 'template/_templates/footer.php';
    }
}

E src/templae/error/index.php

<br><br>
<div class="container text-danger">
    <h3 align="center">Este controller e/ou action <b>( <?=$controller.'/'.$action?> )</b> não existe.</h3>
</div>
<br><br><br><br>

Testando

http://localhost/mini_mvc/teste

Agora ele devolve:
Mini Framework by RibaFS

    Clientes
Este controller e/ou action ( TesteController/index ) não existe.
Aplicativo criado tendo como base o MINI3 adaptado por Ribamar FS.

Ou seja, o controle de error está funcionando.

Detalhes em:
https://github.com/panique/mini3
https://github.com/ribafs/mini-framework
