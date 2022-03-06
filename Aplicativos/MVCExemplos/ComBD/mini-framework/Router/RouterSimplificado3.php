<?php
declare(strict_types = 1);
namespace Mini\Core;

class Router
{
    private $urlController = null;
    private $urlAction = null;
    private $urlParams = array();

    public function __construct()
    {
        if (isset($_GET['url'])) {
            // Separando a URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // Colocando as partes da URL em suas proppriedades
            $this->urlController = isset($url[0]) ? $url[0] : null;
            $this->urlAction = isset($url[1]) ? $url[1] : 'index';// era null
            unset($url[0], $url[1]);

            // Rebase as chaves do array e armazenas no parâmetro da URL
            $this->urlParams = array_values($url);
        }

        // Checar a url por controller: nenhum controller dado? então carregue o controller default
        if (!$this->urlController) {
			// Se nenhum controller for encontrado chame o Controller default com a index action
			$controllerDefault = '\\Mini\\Controller\\' . CONTROLLER_DEFAULT . 'Controller';
			$page = new $controllerDefault;
            $page->index();

		// Se encontrar um controller
        } elseif (file_exists(SRC . 'Controller/' . ucfirst($this->urlController) . 'Controller.php')) {
            $controller = '\\Mini\\Controller\\' . ucfirst($this->urlController) . 'Controller';
            $this->urlController = new $controller();

            // Se o método existir e for chamável
            if (method_exists($this->urlController, $this->urlAction) && is_callable(array($this->urlController, $this->urlAction))) {
                // Se o parâmetro não for vazio chame controller/action/parametro
                if (!empty($this->urlParams)) {
                    call_user_func_array(array($this->urlController, $this->urlAction), $this->urlParams);
                } else {
                    // Se for vazio chame apenas controller/action
                    $this->urlController->{$this->urlAction}();
                }
            // Se o método não existir
            } else {
                    // Se o action tiver comprimento zero então chame o default index()
                if (strlen($this->urlAction) == 0) {
                    $this->urlController->index();
                } else {
                    // Caso contrário chame o ErrorController acusando método não encontrado
					$action = $this->urlAction;
					$contr = explode('\\',$controller);
                    $page = new \Mini\Controller\ErrorController();
                    $page->index($contr[3],$action);
                }
            }
        } else {
            // Se não for encontrado controller então dispare o ErrorController com a mensagem de que o controller não foi encontrado
			$controller = $this->urlController;
			$action = $this->urlAction;
            $page = new \Mini\Controller\ErrorController();
            $page->index(ucfirst($controller).'Controller',$action);// Levar para a view error/index as informações: $controller e $action
        }
    }
}

