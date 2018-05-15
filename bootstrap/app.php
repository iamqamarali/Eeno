<?php

use Framework\Foundation\DIContainer;
use Framework\Foundation\Application;
use Framework\Support\DB;

use Framework\Routing\Router;

use Framework\View\PhpRenderStrategy;
use Framework\View\Contracts\ViewRenderStrategy;
use Framework\Routing\Route;


DIContainer::register('app', function(){
    return new Application();
});
DIContainer::singleton( 'router' , new Router);
DiContainer::register('route' , function($args ){
    return new Route($args[0], $args[1] , $args[2]);
});
DIContainer::register( ViewRenderStrategy::class ,  PhpRenderStrategy::class);
 

return DIContainer::make('app');