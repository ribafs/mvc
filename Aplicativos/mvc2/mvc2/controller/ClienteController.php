<?php
class ClienteController extends Controller{

	function __construct(){
		parent::__construct();
		$this->cli = new Cliente;
	}

	public function create(){
		$this->view('cliente/createCliente');
	}

	public function store(){
		echo $this->tipodocumento;
		echo $this->documento;
		echo $this->nombre;
		echo $this->apellido;
		/*$this->cli->nombre = $this->nombre;
		$this->cli->apellido = $this->apellido;
		$this->cli->tipo_documento_id = $this->tipodocumento;
		$this->cli->documento = $this->documento;
		$this->cli->guardar();*/
	}
}
?>