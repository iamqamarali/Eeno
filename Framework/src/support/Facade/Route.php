<?php

namespace Framework\Support\Facade;

use Framework\Routing\Route as httpRoute;
use FrameWork\Foundation\DIContainer;


class Route extends Facade{

    private static $current = null;

    public static function get($url , $controller_function )
    {
        $route = new httpRoute($url,  "get" ,$controller_function);
        DIContainer::make('router')->register($route);
        return $route;
    } 

    public static function post($url , $controller_function)
    {
        $route = new httpRoute($url,  "post" ,$controller_function);
        DIContainer::make('router')->register($route);
        return $route;
    }


    public static function current()
    {
        if(!self::$current)
            self::$current = resolve('router')->handleUrl(
                                                    resolve('request')->url()
                                                );
        return self::$current;
    }




}