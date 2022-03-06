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
        if (isset($_GET['url'])) {

            // Quebrar a URL em pedaços: url[0] - urlController e url[1] - urlAction
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url); // dividir a url em pedaços entre as barras

            $this->urlController = isset($url[0]) ? $url[0] : null;
            $this->urlAction = isset($url[1]) ? $url[1] : 'index';// era null no original

            unset($url[0], $url[1]);
            $this->urlParams = array_values($url);
        }

        if (!$this->urlController) {// Caso não seja encontrado chame o default
			$controllerDefault = '\\Mvc\\Controller\\' . CONTROLLER_DEFAULT . 'Controller';
			$page = new $controllerDefault;
            $page->index();

        } elseif (file_exists(SRC . 'Controller/' . ucfirst($this->urlController) . 'Controller.php')) {
            $controller = '\\Mvc\\Controller\\' . ucfirst($this->urlController) . 'Controller';
            $this->urlController = new $controller();

            if (method_exists($this->urlController, $this->urlAction) && is_callable(array($this->urlController, $this->urlAction))) {
                
				// Checar se parâmetros não estão vazios
                if (!empty($this->urlParams)) {
                    // Se existir chame o método e passe os argumentos para ele
                    call_user_func_array(array($this->urlController, $this->urlAction), $this->urlParams);
                } else {
                    // Se nenhum parâmetro for informado, apenas chame método sem parameteros, como $this->home->method();
                    $this->urlController->{$this->urlAction}();
                }

			// Se nenhum método for encontrado
            } else {
                if (strlen($this->urlAction) == 0) {
                    // Nenhum action definido: chame o default index() do controller selecionado
                    $this->urlController->index();

				// Caso contrário chame ErrorController
                } else {
					$action = $this->urlAction;
					$contr = explode('\\',$controller);
                    $page = new \Mvc\Controller\ErrorController();
                    $page->index($contr[3],$action);// Alterei para ser mais explícito. Era somente assim: $page->index();
                }
            }   
        } else {
            // Caso contrário chame o controller de erros
			$controller = $this->urlController;
			$action = $this->urlAction;
            $page = new \Mvc\Controller\ErrorController();
            $page->index(ucfirst($controller).'Controller',$action); // Alterei para ser mais explícito. Era somente assim: $page->index();
        }
    }
}
