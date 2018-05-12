<?php

namespace Framework\Routing;

use Framework\Exceptions\RouteNotFoundException;
use Framework\Routing\Contracts\RouteContract;
use Framework\Routing\Contracts\RouterContract;


class Router implements RouterContract{

    private $routes = [];

    
    public function loadRoutesFromFile($file)
    {
        require $file;
        return $this;
    }


    /**
     * 
     * Register a new Route to the Router
     */
    public function register(RouteContract $route)
    {
        $this->routes[] = $route;
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
     * 
     * Check whiter route can handle the request
     */
    public function handleUrl($url)
    {
        foreach($this->routes as $route)
        {
            if($route->handle($url))
                return $route;
        }
        throw new RouteNotFoundException('No Route Defined for '. $url);
    }

    

}