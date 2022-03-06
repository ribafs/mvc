<?php

namespace App;

class View
{
    public function sum(){
        $con = new Controller();
        $result = $con->getSum(3,4);
        return $result;
    }

    public function dif(){
        $con = new Controller();
        $result = $con->getDif(4,3);
        return $result;
    }

}

