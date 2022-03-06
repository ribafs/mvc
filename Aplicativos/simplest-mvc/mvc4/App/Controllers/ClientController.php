<?php

namespace App\Controllers;

use App\Models\ClientModel;

class ClientController
{
    public function index(){
        $clients = new ClientModel();
        $list = $clients->index();

        require_once 'App/views/clients/index.php';
    }
}
