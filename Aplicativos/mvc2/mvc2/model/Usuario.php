<?php

class Usuario extends Model{
  private $id;
  private $nombre;
  private $doc;
  private $constrasena;
  
  function __construct(){
    parent::__construct('usuario');//Nombre de la tabla
  }
  
  function setId($id){
    $this->id = $id;
  }
  
  function setNombre($nombre){
    $this->nombre = $nombre;
  }
  
  function setDocumento($doc){
    $this->doc = $doc;
  }
  
  function setContrasena($con){
    $this->contrasena = password_hash($con, PASSWORD_DEFAULT);
  }
  
  function guardar(){
    $campo="nombre,documento,contrasena";
    $valor="'$this->nombre','$this->doc','$this->contrasena'";
    return $this->insert($campo,$valor);
    
  }
  
  function actualizar(){
    $datos = 'nombre="'.$this->nombre.'", documento='.$this->doc;
    return $this->update($datos,$this->id);
  }
  
  function itemUsuario(){
    $sql = "SELECT item.nombre, item.controlador, item.accion
            FROM usuario
            JOIN `usuario-item` ON usuario.id = `usuario-item`.usuario_id
            JOIN item ON item.id = `usuario-item`.item_id
            WHERE usuario.id = $this->id";
    return $this->sql($sql);
    
  }
}