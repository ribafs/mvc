<?php

//Set Environment
define( 'ENV', 'development' );

//Set default Date/Time
date_default_timezone_set( 'Asia/Bangkok' );

//Set URL
define( 'URL_PUBLIC_FOLDER', 'public' );
define( 'URL_PROTOCOL', 'http://' );
define( 'URL_DOMAIN', $_SERVER['HTTP_HOST'] );
define( 'URL_SUB_FOLDER', str_replace( URL_PUBLIC_FOLDER, '', dirname( $_SERVER['SCRIPT_NAME'] ) ) );
define( 'URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER );

//Set DB Connection
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_USER', 'root' );
define( 'DB_PASS', 'root' );
define( 'DB_NAME', 'testes' );

function autoloadModel( $class_name )
{	
	include APP . 'models' . DIRECTORY_SEPARATOR . strtolower($class_name) . '.php';
}

spl_autoload_register('autoloadModel');
