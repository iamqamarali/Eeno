<?php

namespace Eeno\Routing;

use Eeno\Exceptions\RouteNotFoundException;
use Eeno\Routing\Contracts\RouteResponsibilityContract;
use Eeno\Routing\Contracts\RouterChainContract;
use Eeno\Routing\Contracts\RouterInterface;


class Router implements RouterChainContract , RouterInterface{

    private $routes = [];

    
    public function loadRoutesFromFile($file)
    {
        require $file;
        return $this;
    }


    


    /**
     * 
     * 
     * Supply all the routes to the user
     */
    public function routes()
    {
        return $this->routes;
    }


    /**
     * 
     * Register a new Route to the Router
     */
    public function register(RouteResponsibilityContract $route)
    {
        $this->routes[] = $route;
        return $this;
    }


    
    /**
     *  
     * 
     * Check whiter route can handle the request
     */
    public function handleRequest(\Eeno\Http\Request $request)
    {
        foreach($this->routes as $route)
        {
            if($route->canHandleRequest($request))
                return $route;
        }
        throw new RouteNotFoundException('No Route Defined for '. $request->url());
    }


    /**
     * 
     * 
     * returns route if it has  a specfied name
     */
    public function handleName($name)
    {
        foreach($this->routes as $route)
        {
            if($route->hasName($name))
                return $route;
        }
        throw new RouteNotFoundException('No Route Defined for '. $name);        
    }

}