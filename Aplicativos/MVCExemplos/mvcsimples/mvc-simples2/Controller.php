<?php

require_once 'Model.php';

class Controller
{

    public function listUsers(){
        $model = new Model();
        $result = $model->list();
        return $result;
    }

}

