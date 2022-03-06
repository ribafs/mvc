<?php

/**
 * Description of homeController
 *
 * @author Samuelson
 */
class HomeController extends Controller{
    
    public function index() {

        $this->loadTemplate('home');
    }
    
}
