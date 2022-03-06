<?php

class Home extends Controller
{
	public function index()
	{
		$this->view->pageTitle = "Main Page";
		$this->view->render('home/index');
	}

	public function page1()
	{
		$this->view->pageTitle = "Page 1";
		$this->view->render('home/page1');
	}

	public function page2()
	{
		$this->view->pageTitle = "Page 2";
		$this->view->render('home/page2');
	}
}