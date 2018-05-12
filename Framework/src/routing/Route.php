<?php

namespace Framework\Routing;

use Framework\Routing\Contracts\RouteContract;




class Route implements RouteContract{


    protected $data ;

    /**
     * 
     * Check Weather this route can handle the request or not
     */
    public function handle($url)
    {
        if($this->data['url'] == $url)
            return true;
        return false;
    }


    /**
     * 
     * 
     * Make A route
     */
    public function __construct($url, $method , $controller_function )
    {
        if(!$controller_function instanceof \Closure)
            @list($controller , $function) = explode('@' ,$controller_function);
        else
        {
            $controller = null;
            $function = $controller_function;            
        }

        $this->data = [
            "method" => $method ,
            'url' => $url ,
            'controller' => $controller,
            'function' => $function
        ];
    }


    /**
     * 
     * 
     * Sets a name to the route
     */
    public function name($name = null)
    {
        if($name)
            $this->data['name'] = $name;
        return $this->data['name'];
    }

    /**
     * 
     * return data
     */
    public function data()
    {
        return $this->data;
    }


    
    /**
     * 
     * 
     * return controller
     */
    public function controller()
    {
        return $this->data['controller'];
    }


    /**
     * 
     * 
     * return function
     */
    public function function()
    {
        return $this->data['function'];
    }



    /**
     * 
     * 
     * return method
     */
    public function method()
    {
        return $this->method;
    }


    /**
     * 
     * Return the url of the route
     */
    public function url()
    {
        return $this->data['url'];
    }


}