<?php

class Model{
  
  private $driver,$host,$user,$pass,$database,$charset,$db,$table;
  
  function __construct($table){
    $cfg = require_once 'config/database.php';
    $this->driver=$cfg['driver'];
    $this->host=$cfg['host'];
    $this->user=$cfg['user'];
    $this->pass=$cfg['password'];
    $this->database=$cfg['database'];
    $this->charset=$cfg['charset'];
    
    $this->db = $this->conexion();
    
    $this->table = $table;
  }
  
  private function conexion(){
    
    $con = new PDO($this->driver.':host='.$this->host.
                    ';dbname='.$this->database.
                    ';charset='.$this->charset,
                    $this->user,$this->pass);
    return $con;
  }
  
  public function getAll(){
    
    $query = $this->db->query("SELECT * FROM $this->table ORDER BY id DESC");

    if($query->rowCount() > 0){
      while ($row = $query->fetchObject()){
        $res[]=$row;
      } 
      return $res;
    }else{
      return false;
    }
  }
  
  public function getById($id){
    
    $query = $this->db->query("SELECT * FROM $this->table WHERE id=$id");
    
    if ($query->rowCount()>0) {
      if($row = $query->fetchObject()){
        $resultSet=$row;
      }
      return $resultSet;
    }else{
      return false;
    }
  }
  
  
  public function getBy($column,$value){
    
    $query = $this->db->query("SELECT * FROM $this->table WHERE $column='$value'");
    
    if ($query->rowCount()>0) {
      while($row = $query->fetchObject()){
        $resultSet[] = $row;
      }
      return $resultSet;
    }else{
      return false;
    }
  }
  
  public function deleteById($id){
    $query = $this->db->query("DELETE FROM $this->table WHERE id=$id");
    return $query;
  }
  
  public function deleteBy($column,$value){
    $query = $this->db->query("DELETE FROM $this->table WHERE $column='$value'");
    return $query;
  }
  
  public function insert($campo,$valor){
    $sql = "INSERT INTO $this->table ($campo) VALUES($valor)";
    return $this->db->query($sql);
  }
  
  public function update($datos,$id){
    $sql = "UPDATE $this->table SET $datos WHERE id=$id";
    return $this->db->query($sql);
  }
  
  public function sql($sql){
    $query=$this->db->query($sql);
    
    if($query == true){
      if($query->rowCount() > 0){
        while($row = $query->fetchObject()){
          $resultSet[] = $row;
        }
      }
    }else{
      $resultSet = false; 
    }
    
    return $resultSet;
  }
  
//  public function ejecutarSql($query){
//    
//    $query=$this->db()->query($query);
//    
//    if($query == true){
//      if($query->num_rows > 1){
//        while($row = $query->fetchObject()){
//          $resultSet[] = $row;
//        }
//      }elseif($query->num_rows == 1){
//        if($row = $query->fetchObject()){
//          $resultSet = $row;
//        }
//      }else{
//        $resultSet = true;
//      }
//    }else{
//      $resultSet = false; 
//    }
//    
//    return $resultSet;
//  }
}