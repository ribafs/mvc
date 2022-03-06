<?php
declare(strict_types = 1);
namespace Mvc\Controller;

class ErrorController
{
    public function index($controller = null, $action = null)
    {
        // load views
        require SRC . 'template/_templates/header.php';
        require SRC . 'template/error/index.php';
        require SRC . 'template/_templates/footer.php';
    }
}

