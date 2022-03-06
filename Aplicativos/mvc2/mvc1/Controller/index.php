<?php
require_once 'Core/Controller.php';

class Index extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->view->render('index/index');
	}

	public function edit(){
		$this->view->render('index/edit');
	}

	public function update(){
		$this->view->render('index/update');
	}

	public function error(){
		$this->view->render('error/index');
	}

}
