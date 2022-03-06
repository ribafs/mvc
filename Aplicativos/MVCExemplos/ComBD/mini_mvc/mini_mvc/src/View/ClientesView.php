<?php
// Used in methods from clientes to views

declare(strict_types = 1);
namespace Mvc\View;

class ClientesView
{

	public function index($controller, $action, $clientes, $total_clientes){

        require APP . 'template/_templates/header.php';
        require APP . 'template/'.$controller.'/'.$action.'.php';
        require APP . 'template/_templates/footer.php';
	}

}

