<?php
// Used in methods from controllers to views

declare(strict_types = 1);

namespace RibaFS\View;

class CustomersView
{

	public function index($controller, $action, $customers, $total_customers){

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

