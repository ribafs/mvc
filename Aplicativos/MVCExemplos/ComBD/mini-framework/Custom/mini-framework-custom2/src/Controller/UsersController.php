<?php

/**
 * Class UsersController
 *
 */

declare(strict_types = 1);

namespace Mini\Controller;
use Mini\Model\UsersModel;
use Mini\View\UsersView;

class UsersController
{

    /**
     * PAGE: index
     * This method handles what happens when you move to http://localhost/mini-fw/users/index
     */
    public function index()
    {
		// View users/index send request to Router, it request UsersContoller/index, it request model User/getAllUsers,
		// it response to UsersContoller/index, it response to View Users/index finally
        // Instance new Model (Users)
        $User = new UsersModel();
        // getting all Users and amount of Users to use in view users/index
        $users = $User->getAllUsers();
        $amount_of_users = $User->getAmountOfUsers();

       // load views. within the views we can echo out $users and $amount_of_users easily
		$view = new UsersView();
		$view->index('users','index',$users,$amount_of_users);
    }

    /**
     * ACTION: add
     * This method handles what happens when you move to http://localhost/mini-fw/users/add
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a User" form on users/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to Users/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function add()
    {
        // if we have POST data to create a new User entry. If button 'submit_add_user' in view users/index has clicked
        if (isset($_POST['submit_add_user'])) {
            // Instance new Model (Users)
            $User = new UsersModel();
            // do add() in model/User.php
            $User->add($_POST['login'], $_POST['senha']);
	        // where to go after User has been added
	        header('location: ' . URL . 'users/index');	
        }

        // load views. within the views we can echo out $user easily
		$view = new UsersView();
		$view->add('users','add');
    }

    /**
     * ACTION: delete
     * This method handles what happens when you move to http://localhost/mini-fw/users/delete
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a User" button on users/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to users/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $user_id Id of the to-delete user
     */
    public function delete($user_id)
    {
		// View users/index send request to Router, it request UsersContoller/delete, it request model User/delete,
		// it response to UsersContoller/delete, it response/redirect to View users/index finally

        // if we have an id of a User that should be deleted
        if (isset($user_id)) {
            // Instance new Model (Users)
            $User = new UsersModel();
            // do delete() in model/model.php
            $User->delete($user_id);
        }

        // where to go after User has been deleted
        header('location: ' . URL . 'users/index');
    }

     /**
     * ACTION: edit
     * This method handles what happens when you move to http://localhost/mini-fw/users/edit
     * @param int $user_id Id of the to-edit User
     */
    public function edit($user_id)
    {
        // if we have an id of a User that should be edited
        if (isset($user_id)) {
            // Instance new Model (Users)
            $User = new UsersModel();
	        $users = $User->getAllUsers();

            // do getUser() in model/model.php
            $user = $User->getUser($user_id);

            // If the User wasn't found, then it would have returned false, and we need to display the error page
            if ($user === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                // load views. within the views we can echo out $user easily
				$view = new UsersView();
				$view->edit('users','edit',$users, $user);
            }
        } else {
            // redirect user to Users index page (as we don't have a user_id)
            header('location: ' . URL . 'users/index');
        }
    }

    /**
     * ACTION: update
     * This method handles what happens when you move to http://localhost/mini-fw/users/update
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a User" form on users/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to users/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function update()
    {
        // if we have POST data to create a new User entry
        if (isset($_POST['submit_update_user'])) {
            // Instance new Model (Users)
            $User = new UsersModel();
            // do update() from model/model.php
            $User->update($_POST['login'], $_POST['senha'], $_POST['user_id']);
        }

        // where to go after User has been added
        header('location: ' . URL . 'users/index');
    }
}
