<?php

namespace Eeno\Foundation;

use Eeno\Http\Request;
use Eeno\Foundation\DIContainer;
use Eeno\Support\Facade\Route;
use Eeno\Routing\RouteMethodDispatcher;
use Eeno\Support\Facade\Response;
use Eeno\Support\Database;


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