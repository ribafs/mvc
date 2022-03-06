<?php 
	class Cliente extends Model{

		public $id;
		public $nombre;
		public $apellido;
		public $tipo_documento_id;
		public $documento;

		function __construct(){
			parent::__construct('cliente');
		}

		function guardar(){
		    $campo="nombre,apellido,tipo_documento_id,documento";
		    $valor="'$this->nombre','$this->apellido','$this->tipo_documento_id','$this->documento'";
		    return $this->insert($campo,$valor);    
		}
	}
?>