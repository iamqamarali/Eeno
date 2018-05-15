<?php

namespace Framework\Foundation;

use Framework\Http\Request;
use Framework\Foundation\DIContainer;
use Framework\Support\Facade\Route;
use Framework\Routing\RouteMethodDispatcher;
use Framework\Support\Facade\Response;
use Framework\Support\Database;


class Application{




    public function handle(Request $request)
    {
        DIContainer::singleton('request' , $request);
        $this->connectToDatabase();


        $this->loadRoutes();

        $route = Route::current();


        $response = (new RouteMethodDispatcher())->dispatch($route, $request);

        return Response::make($response);
    }


    /**
     * 
     * 
     * 
     */
    public function connectToDatabase()
    {
        if(config('app.database.name') == null)
            return;

        DIContainer::singleton(
            'database' , 
            new Database(
                config('app.database.name') ,
                config('app.database.host') ,
                config('app.database.username'),
                config('app.database.password')
            )
        );

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