<?php
/**
 * Description of NotFoundController
 *
 * @author Samuelson
 */
class NotFoundController extends Controller{
    
    public function index() {
        $this->loadTemplate('404');
    }
}
