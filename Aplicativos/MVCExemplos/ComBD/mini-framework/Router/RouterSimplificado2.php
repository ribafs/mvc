<?php
declare(strict_types = 1);
namespace Mini\Core;

// Pequena simplificação do Router do mini3. É mais simples, menos código, mas não significa que é melhor, apenas mais fáfil de entender
// Algo no original que é recomendável é manter o método splitUrl() separado
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
       if (isset($_GET['url'])) {

            // Separando a URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // Colocando as partes da URL em suas proppriedades
            $this->urlController = isset($url[0]) ? $url[0] : null;
            $this->urlAction = isset($url[1]) ? $url[1] : 'index';// era null
            unset($url[0], $url[1]);
            // Rebase as chaves do array e armazenar no parâmetro da URL
            $this->urlParams = array_values($url);
        }

        // Caso não exista o controller na URL, chame o default
        if (!$this->urlController) {
            // Monta o caminho com namespace do controller default usando a constante do src/config.php
			$controllerDefault = '\\Mini\\Controller\\' . CONTROLLER_DEFAULT . 'Controller';
            // Instancia o controller default
			$page = new $controllerDefault;
            // Chama o action index() dele
            $page->index();
        // Caso exista o controller na URL montar seu nome
        } elseif (file_exists(SRC . 'Controller/' . ucfirst($this->urlController) . 'Controller.php')) {
            $controller = '\\Mini\\Controller\\' . ucfirst($this->urlController) . 'Controller';
            // Instanciar o controller e armazenar em $this->urlController
            $this->urlController = new $controller();

            // Caso o action exista e for chamável
            if (method_exists($this->urlController, $this->urlAction) && is_callable(array($this->urlController, $this->urlAction))) {
                // Chama o controller, seu action e parâmetro
                call_user_func_array(array($this->urlController, $this->urlAction), $this->urlParams);
            } else {
                // Chame o ErrorController e seu index()
    			$action = $this->urlAction;
				$contr = explode('\\',$controller);
                $page = new \Mini\Controller\ErrorController();
                $page->index($contr[3],$action);
            }
        } else {
            // Chame o ErrorController
			$controller = $this->urlController;
			$action = $this->urlAction;
            $page = new \Mini\Controller\ErrorController();
            $page->index(ucfirst($controller).'Controller',$action);
        }
    }
}
