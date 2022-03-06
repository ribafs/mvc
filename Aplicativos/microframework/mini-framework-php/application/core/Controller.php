<?php

/**
 *  Controller - Classe de controle
 *
 * @author Samuelson
 */
 class Controller {

    public function loadView($viewName, $viewData = array()) {

        $file = "public/views/{$viewName}.php";

        if (file_exists($file)) {
            extract($viewData);
            require $file;
        }else{
            echo "ErroLoadView: Arquivo <b>{$viewName}.php</b> não encontrado.";
            exit;
        }
    }
    
    public function loadTemplate($viewName, $viewData = array(),$titleHTML = null) {
        require 'public/views/template/template.php';
    }
    public function loadTemplateAdmin($viewName, $viewData = array(),$titleHTML = null) {
        require 'public/views/template/template-admin.php';
    }
    public function loadViewInTemplate($viewName, $viewData = array()) {
        
        $file = "public/views/{$viewName}.php";

        if (file_exists($file)) {
            extract($viewData);
            require $file;
        }else{
            echo "ErroViewInTemplate: Arquivo <b>{$viewName}.php</b> não encontrado.";
            exit;
        }
    }
    
    

}
