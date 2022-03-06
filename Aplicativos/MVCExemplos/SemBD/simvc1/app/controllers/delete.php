<?php

class Delete extends Controller
{
	public function movie( $id )
	{
		$id = $id[0];
		$movie = new Movie();
		$movie->deleteMovie( $id );
		header("Location: " . URL . 'movies');
	}
}