<?php

class CSRF
{
	public static function set()
	{
		$rand = microtime();
		$csrf = password_hash( $rand, PASSWORD_BCRYPT );
		Session::set('csrf', $rand);
		return $csrf;
	}

	public static function verify( $csrf )
	{
		if( password_verify( Session::get('csrf'), $csrf ) )
		{
			Session::delete('csrf');
			return true;
		}
		Session::delete('csrf');
		return false;
	}
}