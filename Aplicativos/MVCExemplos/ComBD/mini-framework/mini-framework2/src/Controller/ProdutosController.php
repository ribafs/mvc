<?php
declare(strict_types = 1);

namespace Mini\Controller;
use Mini\Model\ProdutosModel;
use Mini\View\ProdutosView;

class ProdutosController
{

    /**
     * PAGE: index
     * This method handles what happens when you move to http://localhost/mini-framework2/produtos/index
     */
    public function index()
    {
		// View products/index send request to Router, it request ProductsContoller/index, it request model Products/getAllProducts,
		// it response to ProductsContoller/index, it response to View products/index finally
        // Instance new Model (Products)
        $Produtos = new ProdutosModel();
        // getting all products and amount of products to use in view products/index
        $todos = $Produtos->todosProdutos();
        $soma = $Produtos->somaProdutos();

       // load views. within the views we can echo out $products and $amount_of_products easily
		$view = new ProdutosView();
		$view->index('produtos','index',$todos,$soma);
    }

    /**
     * ACTION: add
     * This method handles what happens when you move to http://localhost/mini-fw/products/add
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a product" form on product s/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to product s/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function add()
    {
        // if we have POST data to create a new product entry. If button 'submit_add_product' in view products/index has clicked
        if (isset($_POST['submit_add_produto'])) {
            // Instance new Model (Products)
            $Produtos = new ProdutosModel();
            // do add() in model/Products.php
            $Produtos->add($_POST['nome'],$_POST['descricao'], $_POST['unidade']);
	        // where to go after Products has been added
	        header('location: ' . URL . 'produtos/index');	
        }

        // load views. within the views we can echo out $product easily
		$view = new ProdutosView();
		$view->add('produtos','add');
    }

    /**
     * ACTION: delete
     * This method handles what happens when you move to http://localhost/mini-fw/products/delete
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a product" button on products/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to products/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $product_id Id of the to-delete  product
     */
    public function delete($produto_id)
    {
		// View products/index send request to Router, it request ProductsContoller/delete, it request model Products/delete,
		// it response to ProductsContoller/delete, it response/redirect to View products/index finally

        // if we have an id of a product that should be deleted
        if (isset($produto_id)) {
            // Instance new Model (Products)
            $Produtos = new ProdutosModel();
            // do delete() in model/model.php
            $Produtos->delete($produto_id);
        }

        // where to go after product has been deleted
        header('location: ' . URL . 'produtos/index');
    }

     /**
     * ACTION: edit
     * This method handles what happens when you move to http://localhost/mini-fw/products/edit
     * @param int $product_id Id of the to-edit product
     */
    public function edit($produto_id)
    {
        // if we have an id of a product that should be edited
        if (isset($produto_id)) {
            // Instance new Model (Products)
            $Produtos = new ProdutosModel();
	        $todos = $Produtos->todosProdutos();

            // do getProducts() in model/model.php
            $um = $Produtos->umProduto($produto_id);

            // If the product wasn't found, then it would have returned false, and we need to display the error page
            if ($um === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                // load views. within the views we can echo out $product easily
				$view = new ProdutosView();
				$view->edit('produtos','edit',$todos, $um);
            }
        } else {
            // redirect user to Products index page (as we don't have a product_id)
            header('location: ' . URL . 'produtos/index');
        }
    }

    /**
     * ACTION: update
     * This method handles what happens when you move to http://localhost/mini-fw/products/update
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a product" form on products/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to products/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function update()
    {
        // if we have POST data to create a new product entry
        if (isset($_POST['submit_update_produto'])) {
            // Instance new Model (Products)
            $Produtos = new ProdutosModel();
            // do update() from model/model.php
            $Produtos->update($_POST['nome'],$_POST['descricao'], $_POST['unidade'], $_POST['produto_id']);
        }

        // where to go after product has been added
        header('location: ' . URL . 'produtos/index');
    }
}
