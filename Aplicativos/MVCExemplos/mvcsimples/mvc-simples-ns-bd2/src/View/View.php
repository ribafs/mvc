<?php

namespace Mvc\View;

class View
{
    public function lista(){
        $con = new \Mvc\Controller\Controller();
        return $con->listarUsuarios();
    }

    public function add(){
        $con = new \Mvc\Controller\Controller();
        return $con->addUsuarios($nome);
    }

    public function update(){
        $con = new \Mvc\Controller\Controller();
        return $con->updateUsuarios($id);
    }

    public function delete(){
        $con = new \Mvc\Controller\Controller();
        return $con->deleteteUsuarios($id);
    }

}
