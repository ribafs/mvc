<?php

namespace Mvc\View;

class View
{
    public function sum($nr1,$nr2){
        $con = new \Mvc\Controller\Controller();
        return $con->getSum($nr1,$nr2);
    }

    public function dif($nr1,$nr2){
        $con = new \Mvc\Controller\Controller();
        return $con->getDif($nr1,$nr2);
    }
}
