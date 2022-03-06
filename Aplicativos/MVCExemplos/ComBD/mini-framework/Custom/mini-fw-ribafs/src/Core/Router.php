<?php
declare(strict_types = 1);
namespace RibaFS\Core;

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
			$controllerDefault = '\\RibaFS\\Controller\\' . CONTROLLER_DEFAULT . 'Controller';
			$page = new $controllerDefault;
            $page->index();

        } elseif (file_exists(APP . 'Controller/' . ucfirst($this->urlController) . 'Controller.php')) {
            $controller = '\\RibaFS\\Controller\\' . ucfirst($this->urlController) . 'Controller';
            $this->urlController = new $controller();
            call_user_func_array([$this->urlController, $this->urlAction], $this->urlParams);
            // A linha acima era: call_user_func_array(array($this->urlController, $this->urlAction), $this->urlParams);
        } else {
			$controller = $this->urlController;
			$action = $this->urlAction;
            $page = new \RibaFS\Controller\ErrorController();
            $page->index(ucfirst($controller).'Controller',$action); // Alterei para ser mais explícito. Era somente assim: $page->index();
        }
    }
}
