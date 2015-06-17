<?php

namespace Core;

abstract class Controller{

    public function index(){

    }

    public function getView($name = 'default'){
//        $path = dirname(dirname(__FILE__)).'/src/'.str_replace(array('\\', 'Controller'), array('/', 'views'), get_class($this).'/'.$name.'.php');
        $path = URL . '/src/' . str_replace(array('\\', 'Controller'), array('/', 'views'), get_class($this).'/'.$name.'.php');

        if(!file_exists($path)){
          //@TODO: throw...
        }

        return $path;
    }

}