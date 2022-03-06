<?php

namespace Mvc\Controller;

class Controller
{

    public function getSum($x, $y){
        $model = new \Mvc\Model\Model();
        $result = $model->sum($x, $y);
        return $result;
    }

    public function getDif($x, $y){
        $model = new \Mvc\Model\Model();
        $result = $model->dif($x, $y);
        return $result;
    }

}

