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
		$view->render('clientes','add');
    }

}
