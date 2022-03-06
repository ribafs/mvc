<?php

namespace App\Controllers;

use App\Models\Produto;

class ProdutoController
{
    public function index(){
        $produtos = new Produto();
        $list = $produtos->index();

        require_once APP . 'views/templates/header.php';
        require_once APP . 'views/produtos/index.php';
        require_once APP . 'views/templates/footer.php';

    }
}
