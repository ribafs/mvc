## Estrutura do diretório View

/src/View

- CustomersView.php
- ProductsView.php

- CustomersView.php

```php
<?php
// Used in methods from controllers to views

declare(strict_types = 1);

namespace Mini\View;

class CustomersView
{

	public function index($controller, $action, $customers, $amount_of_customers){

        require APP . 'template/_templates/header.php';
        require APP . 'template/'.$controller.'/'.$action.'.php';
        require APP . 'template/_templates/footer.php';
	}

	public function edit($controller, $action, $customers, $customer){

        require APP . 'template/_templates/header.php';
        require APP . 'template/'.$controller.'/'.$action.'.php';
        require APP . 'template/_templates/footer.php';
	}

	public function add($controller, $action){

        require APP . 'template/_templates/header.php';
        require APP . 'template/'.$controller.'/'.$action.'.php';
        require APP . 'template/_templates/footer.php';
	}

}

```

- ProductsView.php

```php
<?php
// Used in methods from controllers to views

declare(strict_types = 1);

namespace Mini\View;

class ProductsView{

	public function index($controller, $action, $products, $amount_of_products){

        require APP . 'template/_templates/header.php';
        require APP . 'template/'.$controller.'/'.$action.'.php';
        require APP . 'template/_templates/footer.php';
	}

	public function edit($controller, $action, $products,$product){
        require APP . 'template/_templates/header.php';
        require APP . 'template/'.$controller.'/'.$action.'.php';
        require APP . 'template/_templates/footer.php';
	}

	public function add($controller, $action){

        require APP . 'template/_templates/header.php';
        require APP . 'template/'.$controller.'/'.$action.'.php';
        require APP . 'template/_templates/footer.php';
	}

}
```
