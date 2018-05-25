<?php

namespace Framework\Support\Facade;

use FrameWork\Foundation\DIContainer;
use Framework\Routing\Route as HttpRoute;


class Route extends Facade{

    private static $current = null;

    public static function get( $url , $controller_function )
    {
        $route = new HttpRoute( config('app.url').$url,  "get" , $controller_function);
        DIContainer::make('router')->register($route);
        return $route;
    } 

    public static function post($url , $controller_function)
    {
        $route = new HttpRoute( config('app.url').$url,  "post" , $controller_function);
        DIContainer::make('router')->register($route);
        return $route;
    }


    public static function current()
    {
        if(!self::$current)
            self::$current = resolve('router')->handleRequest( resolve('request') );
        return self::$current;
    }

    public static function route($name)
    {
        return  resolve('router')->handleName($name)->url();
    }


}