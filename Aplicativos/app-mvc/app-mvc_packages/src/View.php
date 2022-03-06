<?php
// Used in index() and edit() methods from controllers

namespace Mvc;

class View{

	public function index($controller, $action, $customers,$amount_of_customers){

        require APP . 'view/_templates/header.php';
        require APP . 'view/'.$controller.'/'.$action.'.php';
        require APP . 'view/_templates/footer.php';

		$amount_of_customers = $amount_of_customers;
		$customers = $customers;
	}

	public function edit($controller, $action, $customers,$customer){

        require APP . 'view/_templates/header.php';
        require APP . 'view/'.$controller.'/'.$action.'.php';
        require APP . 'view/_templates/footer.php';

		$customers = $customers;
		$customer = $customer;
	}

}

