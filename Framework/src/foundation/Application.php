<?php

namespace Framework\Foundation;

use Framework\Http\Request;
use Framework\Foundation\DIContainer;
use Framework\Support\Facade\Route;
use Framework\Routing\RouteMethodDispatcher;
use Framework\Support\Facade\Response;

class Application{




    public function handle(Request $request)
    {
        DIContainer::singleton('request' , $request);
        $this->loadRoutes();

        $route = Route::current();

        $response = (new RouteMethodDispatcher())->dispatch($route, $request);

        return Response::make($response);
    }


    /**
     * 
     * 
     * Load the necessary routes for the application
     */
    private function loadRoutes()
    {
        $router = DIContainer::make('router');
        $router->loadRoutesFromFile(config('config.routes_file'));
    }


}