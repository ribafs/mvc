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
        $clientes = $Cliente->todosClientes();// Todos os clientes vindos do model

		$view = new View();
		$view->render('clientes','index', $clientes);
    }

}
