<?php

namespace App\Controllers;

use App\Models\ClientModel;

class ClientController
{
    public function index(){
        $clients = new ClientModel();
        $list = $clients->index();

        require_once APP . 'views/templates/header.php';
        require_once APP . 'views/clients/index.php';
        require_once APP . 'views/templates/footer.php';
    }
}
