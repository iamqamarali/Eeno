<?php

namespace Framework\Support\Facade;

use Framework\Http\Response as HttpResponse;
use Framework\View\View;


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
        $view = new View($path , $params , $statusCode , $headers);
        return $view;
    }


}