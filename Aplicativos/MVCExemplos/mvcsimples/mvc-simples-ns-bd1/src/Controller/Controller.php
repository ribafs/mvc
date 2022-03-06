<?php

namespace Mvc\Controller;

class Controller
{

    public function listarUsuarios(){
        global $pdo;
        $model = new \Mvc\Model\Model();
        $result = $model->listar();
        return $result;
    }
}

