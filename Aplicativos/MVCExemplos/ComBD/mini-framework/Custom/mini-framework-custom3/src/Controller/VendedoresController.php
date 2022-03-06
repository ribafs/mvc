<?php

/**
 * Class VendedoresController
 *
 */

declare(strict_types = 1);

namespace Mini\Controller;
use Mini\Model\VendedoresModel;
use Mini\View\VendedoresView;

class VendedoresController
{

    /**
     * PAGE: index
     * This method handles what happens when you move to http://localhost/mini-fw/vendedores/index
     */
    public function index()
    {
		// View vendedores/index send request to Router, it request VendedoresContoller/index, it request model Vendedor/getAllVendedores,
		// it response to VendedoresContoller/index, it response to View vendedores/index finally
        // Instance new Model (Vendedores)
        $Vendedor = new VendedoresModel();
        // getting all Vendedores and amount of Vendedores to use in view vendedores/index
        $vendedores = $Vendedor->getAllVendedores();
        $amount_of_vendedores = $Vendedor->getAmountOfVendedores();

       // load views. within the views we can echo out $vendedores and $amount_of_vendedores easily
		$view = new VendedoresView();
		$view->index('vendedores','index',$vendedores,$amount_of_vendedores);
    }

    /**
     * ACTION: add
     * This method handles what happens when you move to http://localhost/mini-fw/vendedores/add
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a Vendedor" form on vendedores/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to Vendedores/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function add()
    {
        // if we have POST data to create a new Vendedor entry. If button 'submit_add_vendedor' in view vendedores/index has clicked
        if (isset($_POST['submit_add_vendedor'])) {
            // Instance new Model (Vendedores)
            $Vendedor = new VendedoresModel();
            // do add() in model/Vendedor.php
            $Vendedor->add($_POST['nome'], $_POST['email']);
	        // where to go after Vendedor has been added
	        header('location: ' . URL . 'vendedores/index');	
        }

        // load views. within the views we can echo out $vendedor easily
		$view = new VendedoresView();
		$view->add('vendedores','add');
    }

    /**
     * ACTION: delete
     * This method handles what happens when you move to http://localhost/mini-fw/vendedores/delete
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a Vendedor" button on vendedores/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to vendedores/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $vendedor_id Id of the to-delete vendedor
     */
    public function delete($vendedor_id)
    {
		// View vendedores/index send request to Router, it request VendedoresContoller/delete, it request model Vendedor/delete,
		// it response to VendedoresContoller/delete, it response/redirect to View vendedores/index finally

        // if we have an id of a Vendedor that should be deleted
        if (isset($vendedor_id)) {
            // Instance new Model (Vendedores)
            $Vendedor = new VendedoresModel();
            // do delete() in model/model.php
            $Vendedor->delete($vendedor_id);
        }

        // where to go after Vendedor has been deleted
        header('location: ' . URL . 'vendedores/index');
    }

     /**
     * ACTION: edit
     * This method handles what happens when you move to http://localhost/mini-fw/customers/edit
     * @param int $customer_id Id of the to-edit customer
     */
    public function edit($vendedor_id)
    {
        // if we have an id of a Vendedor that should be edited
        if (isset($vendedor_id)) {
            // Instance new Model (Vendedores)
            $Vendedor = new VendedoresModel();
	        $vendedores = $Vendedor->getAllVendedores();

            // do getVendedor() in model/model.php
            $vendedor = $Vendedor->getVendedor($vendedor_id);

            // If the Vendedor wasn't found, then it would have returned false, and we need to display the error page
            if ($vendedor === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                // load views. within the views we can echo out $vendedor easily
				$view = new VendedoresView();
				$view->edit('vendedores','edit',$vendedores, $vendedor);
            }
        } else {
            // redirect user to Vendedores index page (as we don't have a vendedor_id)
            header('location: ' . URL . 'vendedores/index');
        }
    }

    /**
     * ACTION: update
     * This method handles what happens when you move to http://localhost/mini-fw/vendedores/update
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a Vendedor" form on vendedores/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to vendedores/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function update()
    {
        // if we have POST data to create a new Vendedor entry
        if (isset($_POST['submit_update_vendedor'])) {
            // Instance new Model (Vendedores)
            $Vendedor = new VendedoresModel();
            // do update() from model/model.php
            $Vendedor->update($_POST['nome'], $_POST['email'], $_POST['vendedor_id']);
        }

        // where to go after Vendedor has been added
        header('location: ' . URL . 'vendedores/index');
    }
}
