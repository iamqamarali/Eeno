<?php

namespace Eeno\Support\Facade;

use Eeno\Http\Response as HttpResponse;
use Eeno\View\View;
use Eeno\View\Contracts\ViewRenderStrategy;

class Response extends Facade{

    public static function make($response , $statusCode = 200 , $headers = array())
    {
        if($response instanceof HttpResponse)
            return $response;

        if( is_string($response) ){
            $content = $response;
        }
        else if( is_array( $response) ){
            $content = json_encode($response);
        }
        
        return new HttpResponse($content , $statusCode , $headers);
    }

    /**
     * 
     * 
     * Return a view of the response
     */
    public function view($path, $params = [] , $statusCode = 200 , $headers = array())
    {
        $view = new View($path , $params, resolve(ViewRenderStrategy::class) , $statusCode , $headers);
        return $view;
    }


}