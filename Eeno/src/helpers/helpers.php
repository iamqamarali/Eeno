<?php

use Eeno\Foundation\DIContainer;
use Eeno\Support\Facade\Route;

function config($path)
{
    $keys = explode('.' , $path);
    $configuration = require 'config/'.array_shift($keys).'.php' ;
    return getValue( $keys ,  $configuration);
}

function getValue($keys , $configuration)
{
    $value = $configuration;
    foreach($keys as $key)
    {
        if(array_key_exists( $key , $value ) )
            $value = $value[$key];
    }
    return $value == $configuration ? null : $value;
}

function views_path($path)
{
    return config('config.views_path') . $path;
}


function resolve($dependency )
{
    return DIContainer::make($dependency);
}

function asset($path)
{
    return config('config.assets_path') . $path;
}



function route($name)
{
    return Route::route($name);
}