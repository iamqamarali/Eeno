<?php

namespace Eeno\Routing;

use Eeno\Http\Request;
use Eeno\Routing\Contracts\RouteInterface;

class RouteMethodDispatcher {

    protected $route , $request;

    public function dispatch(RouteInterface $route , Request $request)
    {
        $this->route = $route;
        $this->request = $request;

        
        if(!$response = $this->dispatchClosure())
            $response = $this->dispatchController();


        return $response;
    }


    private function dispatchClosure()
    {
        if($this->route->function() instanceof  \Closure)
            return call_user_func($func, [$this->request]);
        
        return null;
    }


    /**
     * 
     * 
     * IF a controller is attached dispatch it
     */
    private function dispatchController()
    {
        return $response = (new ControllerDispatcher(
                    $this->route->controller(),
                    $this->route->function()
                ))->dispatch($this->request);
    }


}