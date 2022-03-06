<?php
/**
 * Description of Redirect
 *
 * @author Samuelson
 */
class Redirect {
    
    public static function url($url) {
        header("Location: ".BASE_URL.$url);
    }
    
}
