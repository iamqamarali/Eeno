<?php

use Eeno\Foundation\DIContainer;
use Eeno\Foundation\Application;
use Eeno\Support\DB;

use Eeno\Routing\Router;

use Eeno\View\PhpRenderStrategy;
use Eeno\View\Contracts\ViewRenderStrategy;
use Eeno\Routing\Route;


DIContainer::register('app', function(){
    return new Application();
});
DIContainer::singleton( 'router' , new Router);
DIContainer::register( ViewRenderStrategy::class ,  PhpRenderStrategy::class);
 

return DIContainer::make('app');