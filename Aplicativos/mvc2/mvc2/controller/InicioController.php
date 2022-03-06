<?php

class InicioController extends Controller{
  
  function __construct(){
    parent::__construct();//Cargar todos los models
  }
  
  function index(){
//    var_dump($_SESSION['login']);
    
    if(isset($_SESSION['login'])==true){
      $this->view('principal',['usuario'=>$_SESSION['usuario'],
                              'login'=>$_SESSION['login'],
                              'menu'=>$_SESSION['menu']]); 
    }else{
      $this->view('inicio',['prueba'=>'Hi',
                            'prueba2'=>'XD']);
    }
  }
  
  function login(){
    $this->view('login');
  }
  
  function destroy(){
    unset($_SESSION['login']);
    unset($_SESSION['usuario']);
    unset($_SESSION['menu']);
    
    session_destroy();
    
    $this->index();
  }
  
  function flex(){
    $this->view('flex');
  }
  
  function plantillaFlex(){
    $this->view('plantillaFlex');
  }

  function pruebaAjax(){
    $this->view('pruebaAjax');
  }

  function mostrarArreglo(){
    echo json_encode(["Yamaha","Honda","Suzuki"]);
  }
}