<?php

declare(strict_types = 1);

namespace Mvc\Controller;
use Mvc\Model\ClientesModel;
use Mvc\Core\View;

class ClientesController
{

    public function index()
    {
        $Cliente = new ClientesModel();
        $todos = $Cliente->todosClientes();// Todos os clientes vindos do model
        $contagem = $Cliente->somaClientes();

		$view = new View();
		$view->render('clientes','index', $todos, $contagem);
    }

    public function add()
    {
        if (isset($_POST['submit_add_cliente'])) {
            $Cliente = new ClientesModel();
            $Cliente->add($_POST['nome'], $_POST['email']);
	        header('location: ' . URL . 'clientes/index');	
        }

		$view = new View();
		$view->render('clientes','add','','');
    }

    public function edit($cliente_id)
    {
        if (isset($cliente_id)) {
            $Cliente = new ClientesModel();
	        $todos = $Cliente->todosClientes();

            $um = $Cliente->getCliente($cliente_id);

			$view = new View();
			$view->render('clientes','edit',$todos, $um, '');
        } else {
            header('location: ' . URL . 'clientes/index');
        }
    }

    public function update()
    {
        if (isset($_POST['submit_update_cliente'])) {
            $Cliente = new ClientesModel();
            $Cliente->update($_POST['nome'], $_POST['email'], $_POST['cliente_id']);
        }

        header('location: ' . URL . 'clientes/index');
    }


}
