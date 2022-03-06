<?php

namespace App;

class Controller
{

    public function getSum($x, $y){
        $model = new Model();
        $result = $model->sum($x, $y);
        return $result;
    }

    public function getDif($x, $y){
        $model = new Model();
        $result = $model->dif($x, $y);
        return $result;
    }

}

