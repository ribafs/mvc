<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController
{
    public function index(){
        $products = new ProductModel();
        $list = $products->index();

        require_once APP . 'views/templates/header.php';
        require_once APP . 'views/products/index.php';
        require_once APP . 'views/templates/footer.php';

    }
}
