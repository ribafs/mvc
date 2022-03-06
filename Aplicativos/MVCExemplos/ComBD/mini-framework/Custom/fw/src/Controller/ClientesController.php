<?php

declare(strict_types = 1);

namespace RibaFS\Controller;
use RibaFS\Model\ClientesModel;
use RibaFS\View\ClientesView;

class ClientesController
{

    public function index()
    {
        $Cliente = new ClientesModel();
        $todos = $Cliente->todosClientes();
        $soma = $Cliente->somaClientes();

		$view = new ClientesView();
		$view->index('clientes','index',$todos,$soma);
    }

    public function add()
    {
        if (isset($_POST['submit_add_cliente'])) {
            $Cliente = new ClientesModel();
            $Cliente->add($_POST['nome'], $_POST['email']);
	        header('location: ' . URL . 'clientes/index');	
        }

		$view = new ClientesView();
		$view->add('clientes','add');
    }
}
