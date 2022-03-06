<?php

namespace App;

class Controller
{

    public function rows(){
        $model = new Model();
        $regs=$model->getRows();
        return $regs; // Será recebido pela view
    }
}

