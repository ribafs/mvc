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
        $this->splitUrl();

        if (!$this->urlController) {
			$controllerDefault = '\\RibaFS\\Controller\\' . CONTROLLER_DEFAULT . 'Controller';
			$page = new $controllerDefault;
            $page->index();

        } elseif (file_exists(APP . 'Controller/' . ucfirst($this->urlController) . 'Controller.php')) {
            $controller = '\\RibaFS\\Controller\\' . ucfirst($this->urlController) . 'Controller';
            $this->urlController = new $controller();

            if (method_exists($this->urlController, $this->urlAction) && is_callable(array($this->urlController, $this->urlAction))) {
                
                if (!empty($this->urlParams)) {
                    call_user_func_array(array($this->urlController, $this->urlAction), $this->urlParams);
                } else {
                    $this->urlController->{$this->urlAction}();
                }
            } else {
                if (strlen($this->urlAction) == 0) {
                    $this->urlController->index();

                } else {
					$action = $this->urlAction;
					$contr = explode('\\',$controller);// Capture ucfirst($this->urlController) in [3]
                    $page = new \RibaFS\Controller\ErrorController();
                    $page->index($contr[3],$action);
                }
            }
        } else {
			$controller = $this->urlController;
			$action = $this->urlAction;
            $page = new \RibaFS\Controller\ErrorController();
            $page->index(ucfirst($controller).'Controller',$action);
        }
    }

    private function splitUrl()
    {
        if (isset($_GET['url'])) {

            // split URL
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            $this->urlController = isset($url[0]) ? $url[0] : null;
            $this->urlAction = isset($url[1]) ? $url[1] : 'index';// era null

            unset($url[0], $url[1]);

            $this->urlParams = array_values($url);
        }
    }
}

