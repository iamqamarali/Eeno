<?php

namespace Framework\Foundation;

use Framework\Exceptions\ClassNotFoundException;



class DIContainer{


    private static $registered = [];
    private static $singleton = [];


    /**
     * 
     * Register the classes to get the class instances out of DIContainer
     */
    public static function register($class , \Closure $closure = null)
    {
        static::$registered[$class] = $closure ? $closure : $class; 
    }


    /**
     * 
     * 
     * Register all sigle intance class instances
     */
    public static function singleton($class, $instance)
    {
        static::$singleton[$class] = $instance;    
    }

    /**
     * 
     * Create the instance out of the DIContainer
     * 
     */
    public static function make($class)
    {
        if(!isset(static::$registered[$class]) && !isset(static::$singleton[$class]) )
            throw new ClassNotFoundException("$class Not Registered in the Application's DIContainer");

        if( isset(static::$singleton[$class]) )
            return static::$singleton[$class];

        if(static::$registered[$class] instanceof \Closure )
            return static::$registered[$class]();
        
        return new static::$registered[$class];
    }





}