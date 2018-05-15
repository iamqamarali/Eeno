<?php

namespace Framework\Routing;

use Framework\Foundation\Routing\Route;
use Framework\Http\Request;
use Framework\Exceptions\ClassNotFoundException;



class ControllerDispatcher {

    public $controllerName , $controller , $method , $path;


    public function __construct($controllerName , $method)
    {
        $this->path = config('config.controllers_namespace');
        $this->controllerName = $controllerName;
        $this->method = $method;
    }


    /**
     * 
     * 
     * 
     * Dispatch the request
     */
    public function dispatch(Request $request)
    {
        $controller_path = $this->path . $this->controllerName;

        if(!class_exists($controller_path)) 
            throw new ClassNotFoundException('Controller '.$controller_path.' Not Found' );
 
        $this->controller = new $controller_path($request);
        return call_user_func([$this->controller, $this->method ] );
    }


}