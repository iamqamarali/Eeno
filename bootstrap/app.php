<?php

use Framework\Foundation\DIContainer;
use Framework\Foundation\Application;
use Framework\Support\DB;
use Framework\Routing\Router;
use Framework\Routing\Contracts\RouteMethodDispatcherContract;
use Framework\Routing\RouteMethodDispatcher;
use Framework\View\PhpRenderStrategy;
use Framework\View\Contracts\RenderStrategy;


DIContainer::register('app', function(){
    return new Application();
});
DIContainer::singleton('router' , new Router);
DIContainer::register( RenderStrategy::class ,  PhpRenderStrategy::class);


return DIContainer::make('app');