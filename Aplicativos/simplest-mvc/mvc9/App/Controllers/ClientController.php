<?php
namespace App\Controllers;

use App\Models\ClientModel;

class ClientController
{
    public function index(){
        $client = new ClientModel();
        $clients = $client->index();

        require_once APP . 'views/templates/header.php';
        require_once APP . 'views/clients/index.php';
        require_once APP . 'views/templates/footer.php';
    }

    public function add(){
        // if we have POST data to create a new client entry
        if (isset($_POST["submit_add_client"])) {
            $client = new ClientModel();
            $client->add($_POST["nome"], $_POST["idade"]);
        }

        header('location: '.URL.'clients/index');
    }

    public function delete($id)
    {
        if (isset($id)) {
            $client = new ClientModel();
            $client->delete($id);
        }
        header('location: ' . URL . 'clients/index');
    }

    public function edit($id)
    {
        // Verifica se $id tá setado
        if (isset($id)) {
            $client = new ClientModel();
            $client = $client->edit($id);

            if ($client === false) {
                $page = new \Core\ErrorController();
                $page->index();
            } else {
                require APP . 'views/templates/header.php';
                require APP . 'views/clients/index.php';
                require APP . 'views/templates/footer.php';
            }
        // Caso $id não esteja setado, redireciona para a index
        }else{
            header('location: ' . URL . 'clients/index');
        }
    }

    public function update()
    {
        if (isset($_POST["submit_update_client"])) {
            $client = new ClientModel();
            $client->update($_POST["nome"], $_POST["idade"], $_POST['id']);
        }

        header('location: ' . URL . 'clients/index');
    }
}
