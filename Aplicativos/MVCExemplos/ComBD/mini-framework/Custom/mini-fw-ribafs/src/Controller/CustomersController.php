<?php

declare(strict_types = 1);

namespace RibaFS\Controller;
use RibaFS\Model\CustomersModel;
use RibaFS\View\CustomersView;

class CustomersController
{

    public function index()
    {
        $Customer = new CustomersModel();
        $customers = $Customer->todosCustomers();
        $contagem = $Customer->somaCustomers();

		$view = new CustomersView();
		$view->index('customers','index',$customers,$contagem);
    }

    public function add()
    {
        if (isset($_POST['submit_add_customer'])) {
            $Customer = new CustomersModel();
            $Customer->add($_POST['name'], $_POST['email'],  $_POST['birthday']);
	        header('location: ' . URL . 'customers/index');	
        }

		$view = new CustomersView();
		$view->add('customers','add');
    }

    public function delete($customer_id)
    {
        if (isset($customer_id)) {
            $Customer = new CustomersModel();
            $Customer->delete($customer_id);
        }

        header('location: ' . URL . 'customers/index');
    }

    public function edit($customer_id)
    {
        if (isset($customer_id)) {
            $Customer = new CustomersModel();
	        $customers = $Customer->todosCustomers();

            $customer = $Customer->getCustomer($customer_id);

			$view = new CustomersView();
			$view->edit('customers','edit',$customers, $customer);
        } else {
            header('location: ' . URL . 'customers/index');
        }
    }

    public function update()
    {
        if (isset($_POST['submit_update_customer'])) {
            $Customer = new CustomersModel();
            $Customer->update($_POST['name'], $_POST['email'],  $_POST['birthday'], $_POST['customer_id']);
        }

        header('location: ' . URL . 'customers/index');
    }
}
