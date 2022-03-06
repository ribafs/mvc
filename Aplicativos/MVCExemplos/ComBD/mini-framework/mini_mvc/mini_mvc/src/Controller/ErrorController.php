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

