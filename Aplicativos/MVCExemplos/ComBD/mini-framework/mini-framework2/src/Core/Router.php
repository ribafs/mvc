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
        $this->splitUrl();

        if (!$this->urlController) {
			$controllerDefault = '\\Mini\\Controller\\' . CONTROLLER_DEFAULT . 'Controller';
			$page = new $controllerDefault;
            $page->index();

		// if encounter a controller
        } elseif (file_exists(APP . 'Controller/' . ucfirst($this->urlController) . 'Controller.php')) {
            $controller = '\\Mini\\Controller\\' . ucfirst($this->urlController) . 'Controller';
            $this->urlController = new $controller();

            if (method_exists($this->urlController, $this->urlAction) && is_callable(array($this->urlController, $this->urlAction))) {
                call_user_func_array(array($this->urlController, $this->urlAction), $this->urlParams);
			// if none method is found
            } else {
					$action = $this->urlAction;
					$contr = explode('\\',$controller);
                    $page = new \Mini\Controller\ErrorController();
                    $page->index($contr[3],$action);
            }

		// if none controller is found fire ErrorController
        } else {
			$controller = $this->urlController;
			$action = $this->urlAction;
            $page = new \Mini\Controller\ErrorController();
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

            $this->urlController = isset($url[0]) ? $url[0] : null;// controller é url[0]
            $this->urlAction = isset($url[1]) ? $url[1] : 'index';// era null no original. action é url[1]

            // Remove controller and action from the split URL
            unset($url[0], $url[1]);

            // Rebase array keys and store the URL params
            $this->urlParams = array_values($url);
        }
    }
}

