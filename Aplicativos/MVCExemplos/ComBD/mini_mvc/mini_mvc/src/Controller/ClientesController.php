<?php

declare(strict_types = 1);

namespace Mvc\Controller;
use Mvc\Model\ClientesModel;
//use Mvc\View\ClientesView;

class ClientesController
{

    public function index()
    {
        $Cliente = new ClientesModel();
        $todos = $Cliente->todosClientes();

		$view = new ClientesView();
		$view->index('clientes','index',$todos,'');
    }

}
