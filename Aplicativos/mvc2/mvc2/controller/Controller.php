<?php

class Controller{
  
  function __construct(){
    
    session_start();
 
    //Cargar todos los modelos
    require_once('model/Model.php');
    foreach(glob("model/*.php") as $file){
      require_once $file;
    }

    //Crear y cargar todas las variables enviadas por POST
    foreach($_POST as $key => $value){
      $this->{$key} = $value;
    }
  }
  
  public function view($vista,$datos=null){//Cuando no envio va a ser nulo
    
    if(isset($datos)){
      
//      Crear variables en la vista a partir del array $datos
      foreach($datos as $key => $value){
        ${$key} = $value;
      }
    }
    
    require_once 'view/'.$vista.'.php';
  }

  
  //------------------------ Enrutamiento ----------------------------------
  
  static function cargarControlador($controller){
    $controlador=ucwords($controller).'Controller';
    $archivoController='controller/'.$controlador.'.php';
    
    if(!is_file($archivoController)){
      $controlador=ucwords(CONTROLLER_DEFAULT).'Controller';
      $archivoController='controller/'.$controlador.'.php';
    }
    
    require_once $archivoController;
    return new $controlador;
  }
  
  static function cargarAccion($controllerObj,$action){
    if(method_exists($controllerObj, $action)){
//      self::ejecutarAccion($controllerObj, $_GET['a']);
      $controllerObj->$action();
    }else{
//      self::ejecutarAccion($controllerObj, ACTION_DEFAULT);
      header('Location: index.php');
    }
  }
    
}
