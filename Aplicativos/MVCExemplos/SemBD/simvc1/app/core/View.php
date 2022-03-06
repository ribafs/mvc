<?php

Class View 
{
	private $title = 'Simvc | Minimal PHP MVC Framework';
	
	public function render( $name )
	{
		require_once APP . 'views/template/header.php';
		require_once APP . 'views/' . $name . '.php';
		require_once APP . 'views/template/footer.php';
	}
}