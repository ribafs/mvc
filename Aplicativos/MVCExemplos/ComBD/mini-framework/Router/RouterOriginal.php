<?php
declare(strict_types = 1);
namespace Mini\Core;

class Router
{
    private $urlController = null;
    private $urlAction = null;
    private $urlParams = array();

    /**
     * "Iniciar" a aplicação:
     * Analisar os elementos da URL e chamar o correspondente controller/action ou o de erro
     */
    public function __construct()
    {
        // Criar um array com as partes da URL em $url
        $this->splitUrl();

        // Checar a url por controller: nenhum controller dado? então carregue o controller default
        if (!$this->urlController) {
			// Se nenhum controller for encontrado chame o Controller default com a index action
			$controllerDefault = '\\Mini\\Controller\\' . CONTROLLER_DEFAULT . 'Controller';
			$page = new $controllerDefault;
            $page->index();

		// Se encontrar um controller
        } elseif (file_exists(SRC . 'Controller/' . ucfirst($this->urlController) . 'Controller.php')) {
            // Aqui nós checamos por controller: existe um controller?
            // se sim, então carregue este arquivo e crie este controller
            // como \Mini\Controller\ClientesController
            $controller = '\\Mini\\Controller\\' . ucfirst($this->urlController) . 'Controller';
            $this->urlController = new $controller();

            // Checar por um method: existe um método no controller?
			// Se existe método e se é um método chamável
            if (method_exists($this->urlController, $this->urlAction) && is_callable(array($this->urlController, $this->urlAction))) {
                
				// Checar se os parâmetros não são vazios
                if (!empty($this->urlParams)) {
                    // Se existe chame o método e passe os argumentos para ele
                    call_user_func_array(array($this->urlController, $this->urlAction), $this->urlParams);
                } else {
                    // Se nenhum parâmetro for dado, apenas chame o método sem parâmetros, como $this->ClientesController->method();
                    $this->urlController->{$this->urlAction}();
                }

			// Se nenhum método for encontrado
            } else {
                if (strlen($this->urlAction) == 0) {
                    // Nenhum action definido: chame o default index() do controller selecionado
                    $this->urlController->index();

				// De outra forma chame o ErrorController
                } else {
					$action = $this->urlAction;
					$contr = explode('\\',$controller);
                    $page = new \Mini\Controller\ErrorController();
                    $page->index($contr[3],$action);
                }
            }

		// Se nenhum controller for encontrado chame o ErrorController
        } else {
			$controller = $this->urlController;
			$action = $this->urlAction;
            $page = new \Mini\Controller\ErrorController();
            $page->index(ucfirst($controller).'Controller',$action);
        }
    }

    /**
     * Receba a URL e a separe em partes
     */
    private function splitUrl()
    {
		// Checar se url está isset
        if (isset($_GET['url'])) {

            // Separando a URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // Colocando as partes da URL em suas proppriedades
            $this->urlController = isset($url[0]) ? $url[0] : null;
            $this->urlAction = isset($url[1]) ? $url[1] : 'index';// era null

            // Remover o controller e o action das partes da URL
            unset($url[0], $url[1]);

            // Rebase as chaves do array e armazenar no parâmetro da URL
            $this->urlParams = array_values($url);

            // Para DEBUG da Router. Descomente as linhas abaixo caso tenha problemas com a URL
            // echo 'Controller: ' . ucfirst($this->urlController) . '<br>';
            // echo 'Action: ' . $this->urlAction . '<br>';
            // echo 'Parameters: ' . print_r($this->urlParams, true) . '<br>';
        }
    }
}

