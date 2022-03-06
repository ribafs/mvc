<?php

/**
 * Description of Session
 *
 * @author Samuelson
 */
class Session {
    
    public function __construct() {
        if (!session_id()):
            session_start();
        endif;
    }
    
    public static function start(array $params) {
        foreach ($params as $key => $param) {
            $_SESSION["$key"] = $param;
        }
    }
    
    public static function get($param) {
        return !empty($_SESSION["$param"]) ? $_SESSION["$param"] : null;
    }
    
    public static function destroy() {
        session_destroy();
    }

}
