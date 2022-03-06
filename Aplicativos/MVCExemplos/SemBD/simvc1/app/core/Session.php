<?php

class Session
{

	public static function init()
	{
		if( !isset( $_SESSION ) )
		{
			session_start();			
		}
	}

	public static function set( $key, $val )
	{
		self::init();
		$_SESSION[$key] = $val;
	}

	public static function get( $key )
	{
		self::init();
		return $_SESSION[$key];
	}

	public static function delete( $key )
	{
		self::init();
		unset( $_SESSION[$key] );
	}

	public static function destroy()
	{
		self::init();
		session_destroy();
	}
}