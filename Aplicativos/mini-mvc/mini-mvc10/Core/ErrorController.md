# Core\ErrorController.php

```php

<?php
declare(strict_types = 1);
namespace Core;

class ErrorController
{
    public function index($controller = null, $action = null, $type=null)
    {
        // Carregar a view index.phtml e os includes
        require APP . 'Views/_includes/header.phtml';
        require APP . 'Views/error/index.phtml';
        require APP . 'Views/_includes/footer.phtml';
    }
}
```
Observe que o método index() recebe 3 parâmetros: $controller, $action e $type. Os dois primeiros são os nomes e $type retorna 1 ou  2, caso seja controller ou action.


