<?php

class Movie extends Model
{
	protected $table = 'vdo';
	protected $pk    = 'id';

	public function addMovie()
	{
		Session::init();
		if( CSRF::verify( $_POST['csrf'] ) )
		{
			$title    = filter_input( INPUT_POST, 'title', FILTER_SANITIZE_STRING);
			$path     = filter_input( INPUT_POST, 'path', FILTER_SANITIZE_STRING);
			$path     = stristr($path, "v=");
			$path     = substr($path, 2, 11);
			$favorite = filter_input( INPUT_POST, 'favorite', FILTER_VALIDATE_BOOLEAN);

			if( isset( $favorite ) )
			{
				$favorite = 'true';
			}
			else
			{
				$favorite = 'false';
			}

			$movie = new Movie();
			$movie->insert( array(
				'title'    => $title,
				'path'     => $path,
				'favorite' => $favorite
				) );
		}
	}

	public function updateMovie( $id )
	{
		Session::init();
		if( CSRF::verify( $_POST['csrf'] ) )
		{
			$title    = filter_input( INPUT_POST, 'title', FILTER_SANITIZE_STRING);
			$path     = filter_input( INPUT_POST, 'path', FILTER_SANITIZE_STRING);
			$path     = stristr($path, "v=");
			$path     = substr($path, 2, 11);
			$favorite = filter_input( INPUT_POST, 'favorite', FILTER_VALIDATE_BOOLEAN);

			if( isset( $favorite ) )
			{
				$favorite = 'true';
			}
			else
			{
				$favorite = 'false';
			}

			$movie = new Movie();
			$movie->update( array(
				'title'    => $title,
				'path'     => $path,
				'favorite' => $favorite
				), $id );
		}
	}

	public function deleteMovie( $id )
	{
		$movie = new Movie();
		$movie->delete( $id );
	}
}