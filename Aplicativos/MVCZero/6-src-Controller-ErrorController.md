## Estrutura do arquivo ErrorController

Este controller customiza as mensagens de erro dos controllers

/src/Controller/ErrorController.php

```php
<?php
declare(strict_types = 1);

namespace Mini\Controller;

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

```

