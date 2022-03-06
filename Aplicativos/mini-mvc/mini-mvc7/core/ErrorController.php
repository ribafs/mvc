<?php
declare(strict_types = 1);
namespace Core;

class ErrorController
{
    public function index($controller = null, $action = null)
    {
        // load views
        require APP . 'View/_includes/header.phtml';
        require APP . 'View/error/index.phtml';
        require APP . 'View/_includes/footer.phtml';
    }
}

