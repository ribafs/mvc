<?php

class Update extends Controller
{
	public function movie( $id )
	{
		$id = $id[0];
		$movie = new Movie();
		$movie->updateMovie( $id );
		header("Location: " . URL . 'movies');
	}
}