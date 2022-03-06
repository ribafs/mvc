<?php

namespace Mvc\Controller;

class Controller
{

    public function listarUsuarios(){
        $model = new \Mvc\Model\Model();
        $result = $model->listar();
        return $result;
    }
}

