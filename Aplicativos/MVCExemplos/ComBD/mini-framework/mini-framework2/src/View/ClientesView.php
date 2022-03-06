<?php
declare(strict_types = 1);
namespace Mini\View;

class ClientesView
{
	public function index($controller, $action, $todos, $soma){
        require APP . 'templates/_includes/header.php';
        require APP . 'templates/'.$controller.'/'.$action.'.php';
        require APP . 'templates/_includes/footer.php';
	}

	public function edit($controller, $action, $todos, $um){

        require APP . 'templates/_includes/header.php';
        require APP . 'templates/'.$controller.'/'.$action.'.php';
        require APP . 'templates/_includes/footer.php';
	}

	public function add($controller, $action){

        require APP . 'templates/_includes/header.php';
        require APP . 'templates/'.$controller.'/'.$action.'.php';
        require APP . 'templates/_includes/footer.php';
	}

}

