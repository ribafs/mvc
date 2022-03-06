<?php

require_once 'App/Models/ClientModel.php';

class ClientController
{
    public function index(){
        $clients = new ClientModel();
        $list = $clients->index();

        require_once 'App/views/clients/index.php';
    }
}
