<?php

Class App
{
	private $controller = 'home';

	private $method = 'index';
		
	private $params = array();

	function __construct()
	{
		switch ( ENV ) 
		{
			case 'development':
				ini_set( 'error_reporting', -1 );
				ini_set( 'display_errors', 1 );
				break;
			case 'production':
				ini_set( 'error_reporting', 0 );
				ini_set( 'display_errors', 0 );
				break;
			default:
				ini_set( 'error_reporting', 0 );
				ini_set( 'display_errors', 0 );
				break;
		}

		$url = filter_input( INPUT_GET, 'url', FILTER_SANITIZE_URL );

		if( isset( $url ) )
		{
			$url = rtrim( $url, '/' );
			$url = explode( '/', $url );
		}

		if( isset( $url[0] ) )
		{
			$this->controller = $url[0];
		}

		if( isset( $url[1] ) )
		{
			$this->method = $url[1];
		}

		if( isset( $url[2] ) )
		{
			$this->params = array_slice( $url, 2 );
		}

		$file = APP . 'controllers' . DIRECTORY_SEPARATOR . $this->controller . '.php';

		if( !file_exists( $file ) )
		{
			self::displayError();
		}

		require_once $file;

		$controller = new $this->controller;

		if( !method_exists( $controller, $this->method ) )
		{
			self::displayError();
		}

		$controller->{$this->method}($this->params);

	}

	public static function displayError()
	{
			$file = APP . 'controllers' . DIRECTORY_SEPARATOR . 'error.php';
			require_once $file;
			$controller = new Error();
			exit();
	}
}