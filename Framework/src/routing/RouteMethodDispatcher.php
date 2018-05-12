<?php

namespace Framework\Routing;

use Framework\Http\Request;

class RouteMethodDispatcher {

    protected $route , $request;

    public function dispatch(Route $route , Request $request)
    {
        $this->route = $route;
        $this->request = $request;

        
        $response = $this->dispatchClosure();

        if(!$response)
            $response = $this->dispatchController();

        return $response;
    }


    private function dispatchClosure()
    {
        $routeData = $this->route->data();
        
        if($routeData['function'] instanceof \Closure)
            return $routeData['function']($this->request);
        
        return null;
    }


    /**
     * 
     * 
     * IF a controller is attached dispatch it
     */
    private function dispatchController()
    {
        $routeData = $this->route->data();
        
        return $response = (new ControllerDispatcher(
                    $routeData['controller'] ,
                    $routeData['function']
                )
            )->dispatch($this->request) ;
    }


}