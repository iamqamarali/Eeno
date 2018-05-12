<?php

use Framework\Foundation\DIContainer;
use Framework\Foundation\Application;
use Framework\Support\DB;
use Framework\Routing\Router;
use Framework\Routing\Contracts\RouteMethodDispatcherContract;
use Framework\Routing\RouteMethodDispatcher;

DIContainer::register('app', function(){
    return new Application();
});

DIContainer::singleton('router' , new Router);


return DIContainer::make('app');