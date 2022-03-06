<?php

class Create extends Controller
{
	public function movie()
	{
		$movie = new Movie();
		$movie->addMovie();
		header("Location: " . URL . 'movies');
	}
}