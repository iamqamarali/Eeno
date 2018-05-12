<?php

use Framework\Foundation\DIContainer;

function config($path)
{
    $path = explode('.' , $path);
    $configuration = require 'config/'.$path[0].'.php' ;
    return isset($configuration[$path[1]]) ? $configuration[$path[1]] : null;
}

function views_path($path)
{
    return config('config.views_path') . $path;
}


function resolve($dependency)
{
    return DIContainer::make($dependency);
}

function asset($path)
{
    return config('config.assets_path') . $path;
}