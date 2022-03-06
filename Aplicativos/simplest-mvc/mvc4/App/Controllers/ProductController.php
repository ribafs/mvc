<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController
{
    public function index(){
        $products = new ProductModel();
        $list = $products->index();

        require_once 'App/views/products/index.php';
    }
}
