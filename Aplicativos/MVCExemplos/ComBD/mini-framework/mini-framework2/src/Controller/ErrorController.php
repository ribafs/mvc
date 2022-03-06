<?php
declare(strict_types = 1);
namespace Mini\Controller;

class ErrorController
{
  
  /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index($controller = null, $action = null)
    {
        // load views
        require APP . 'templates/_includes/header.php';
        require APP . 'templates/error/index.php';
        require APP . 'templates/_includes/footer.php';
    }
}

