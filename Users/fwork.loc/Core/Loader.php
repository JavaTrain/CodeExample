<?php

class Loader{

    private $pathCore = '';
    private $pathSrc = "/../src/";

    public function __construct(){

        $this->pathCore = dirname(dirname(__FILE__)).'/';

	}
    
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    private function loadClass($class)
    {
        
        $fileCore = $this->pathCore
            . str_replace('\\', '/', $class)
            . '.php';
            
        $fileSrc = __DIR__ 
            . $this->pathSrc
            . str_replace('\\', '/', $class)
            . '.php';
		

        
        if (file_exists($fileCore)) {
            require $fileCore;
            return true;
        }
        if (file_exists($fileSrc)) {
            require $fileSrc;
            return true;
        }
        return false;
    }
}