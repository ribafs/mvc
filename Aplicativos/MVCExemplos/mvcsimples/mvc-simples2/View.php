<?php

require_once 'Controller.php';

class View
{
    public function list(){
        $con = new Controller();
        return $con->listUsers();
    }

}
