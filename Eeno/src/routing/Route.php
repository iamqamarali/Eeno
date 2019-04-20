<?php

namespace Eeno\Routing;

use Eeno\Routing\Contracts\RouteResponsibilityContract;
use Eeno\Routing\Contracts\RouteInterface;




class Route implements RouteResponsibilityContract , RouteInterface {


    protected $data ;

    /**
     * 
     * Check Weather this route can handle the request or not
     */
    public function canHandleRequest(\Eeno\Http\Request $request)
    {
        if( strcasecmp($request->method() , $this->method() ) == 0 &&
            strcasecmp($this->url() , $request->url() ) == 0)
            return true;
        return false;    
    }


    /**
     * 
     * Checks if the route name is the name specfied
     * 
     */
    public function hasName($name)
    {
        if(strcasecmp($this->data['name'], $name ) == 0)
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
        return $this->data['method'];
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