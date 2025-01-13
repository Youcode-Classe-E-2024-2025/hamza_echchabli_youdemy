<?php


class Autoloader {
    
    private $baseDir;

    public function __construct() {
        
        $this->baseDir = dirname(__DIR__) . '/';
    }

    
    public function load($className) {
        
        $className = str_replace('\\', '/', $className);
        
        
        $file = $this->baseDir . $className . '.php';
        
        
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
        
        return false;
    }

    // Register the autoloader
    public function register() {
        spl_autoload_register([$this, 'load']);
    }
}

// Instantiate and register the autoloader
$autoloader = new Autoloader();
$autoloader->register();