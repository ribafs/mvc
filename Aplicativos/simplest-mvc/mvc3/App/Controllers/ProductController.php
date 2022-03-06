<?php

require_once 'App/Models/ProductModel.php';

class ProductController
{
    public function index(){
        $products = new ProductModel();
        $list = $products->index();

        require_once 'App/views/products/index.php';
    }
}
