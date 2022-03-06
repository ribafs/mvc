<?php

Class Controller 
{
	function __construct()
	{
		$this->view = new View();
	}

	public function auth()
	{
		Session::init();
		if( !Session::get( 'login' ) )
		{
			unset($_GET);
			unset($_POST);
			header('Location: ' . URL, true, 304);
		}
	}
}