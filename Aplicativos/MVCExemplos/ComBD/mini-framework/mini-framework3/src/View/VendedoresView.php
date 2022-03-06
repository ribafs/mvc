<?php
declare(strict_types = 1);
namespace Mini\View;

class VendedoresView
{

	public function index($controller, $action, $todos, $soma){
        require SRC . 'templates/_includes/header.php';
        require SRC . 'templates/'.$controller.'/'.$action.'.php';
        require SRC . 'templates/_includes/footer.php';
	}

	public function edit($controller, $action, $todos, $um){
        require SRC . 'templates/_includes/header.php';
        require SRC . 'templates/'.$controller.'/'.$action.'.php';
        require SRC . 'templates/_includes/footer.php';
	}

	public function add($controller, $action){
        require SRC . 'templates/_includes/header.php';
        require SRC . 'templates/'.$controller.'/'.$action.'.php';
        require SRC . 'templates/_includes/footer.php';
	}

}

