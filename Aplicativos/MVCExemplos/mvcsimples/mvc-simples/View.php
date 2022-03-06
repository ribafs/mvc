<?php

require_once 'Controller.php';

class View
{
    public function sum(){
        $con = new Controller();
        return $con->getSum(3,4);
    }

    public function dif(){
        $con = new Controller();
        return $con->getDif(4,3);
    }
}
