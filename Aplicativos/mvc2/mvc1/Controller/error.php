<?php

class Error extends Controller{

        public function __construct($error){
                parent::__construct();
                $this->view->errors = array($error);
        }

        public function index(){
                $this->view->render('error/index');
        }
}
