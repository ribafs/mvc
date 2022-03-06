<?php

namespace Mvc\View;

class View
{
    public function lista(){
        $con = new \Mvc\Controller\Controller();
        return $con->listarUsuarios();
    }
}
