<?php

class BaseController {
    public function __construct() {
        session_start();

        if (!isset($_SESSION['lang'])) {
            $_SESSION['lang'] = 'en'; 
        }

        if (isset($_GET['lang'])) {
            $_SESSION['lang'] = $_GET['lang'];
        }
    }
    
    protected function loadLanguageFile() {
        
        require_once __DIR__ . '/../lang/' . $_SESSION['lang'] . '.php';
        return $lang;
    }
}


?>