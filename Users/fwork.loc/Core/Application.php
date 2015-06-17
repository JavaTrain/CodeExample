<?php

namespace Core;

use Core\Service;
use Core\Request;
use Core\Response;
use Core\RedirectResponse;
use Core\Renderer;
use Core\DB;
use Core\Log;
use Core\Config;

class Application{
	
	/**
	 * 
	 */
	public function __construct(){

        $config = new Config();
        $config ->loadConfig('config.yml');
        Service::set('config', $config);

        $request = new Request();
        Service::set('request', $request);

        $routes = include('../config/routes.php');

        $router = new Router($routes);
        Service::set('router', $router);
        Service::set('pdo', new \PDO($config->getVal('mysql/type')
                        .':host=' . $config->getVal('mysql/host')
                        .';dbname=' . $config->getVal('mysql/db'),
                        $config->getVal('mysql/username'),
                        $config->getVal('mysql/pass'),
                        array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        \PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
        ));
        $log = new Log(URL.'/logs/log.txt');
        Service::set('log', $log);
	}	 

    /**
     * Dispatch
     */
    public function run(){

        $request = Service::get('request');
        $route = Service::get('router')->find($request->getUrl());

        if(!empty($route)){

                $controller_class = $route['controller'];

                if(!class_exists($controller_class)){
                    throw new \Exception("Controller class [" . $route['controller'] . "] doesn't exist");
                }

                $controller = new $controller_class();

                if(!method_exists($controller, $route['action'].'Action'))
                    throw new \Exception("Method [" . $route['action'] . "Action ] doesn't exist in [" . $route['controller'] . "]");

                $action = $route['action'].'Action';

                $response = call_user_func_array([$controller, $action], $route['params']);

                if($response->type == 'html'){
//                        $renderer = new Renderer(dirname(__DIR__).'/src/template.php');
                    $renderer = new Renderer(URL . '/src/template.php');
                    $renderer->setVars(array(
                        'content' => $response->content
                    ));

                    $response->content = $renderer->render();
                }

                $response->send();
        }else{
            throw new \Exception("Wrong route [" . $request->getUrl() . "]");
        }

    }
	
}