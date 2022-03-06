<?php

class Movies extends Controller
{
	function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$movies = Movie::select('*')->orderBy('id', 'DESC')->get();
		$this->view->movies = $movies;
		$this->view->moviesNum = count($movies);

		$this->view->pageTitle = "Movies Page";
		$this->view->render('movies/index');
	}

	public function add()
	{
		$this->view->pageTitle = "Movies Page";
		$this->view->render('movies/add');
	}

	public function edit( $id )
	{
		$movie = Movie::select('*')->where('id = ' . $id[0])->get();
		$this->view->movie = $movie;
		$this->view->pageTitle = "Movies Page";
		$this->view->render('movies/edit');
	}
}