<?php

//Configuración global
require_once 'config/global.php';

//Base para los controladores
require_once 'controller/Controller.php';

if(isset($_GET['c'])){
  $c=$_GET['c'];
  $a=$_GET['a'];
}else if(isset($_POST['c'])){
  $c=$_POST['c'];
  $a=$_POST['a'];
}else{
  $c=CONTROLLER_DEFAULT;
  $a=ACTION_DEFAULT;
}

$controllerObj = Controller::cargarControlador($c);
Controller::cargarAccion($controllerObj,$a);
