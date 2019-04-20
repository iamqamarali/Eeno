<?php
namespace Eeno\Http;

use Eeno\Support\Bag;

class Request{


    private $headers ;
    private $method  , $uri;
    private $parameters;

    /**
     * Constructor
     */
    public function __construct($headers , $method , $uri , $get_params , $post_params)
    {
        $this->headers = new Bag($headers);
        $this->method = $method;
        $this->uri = $uri;
        $this->parameters = [ 
                                'get' => new Bag($get_params) , 
                                'post' => new Bag($post_params) 
                            ];
    }


    /**
     * 
     * Capture the request and instanciate
     */
    public static function capture()
    {
        return new static($_SERVER ,$_SERVER['REQUEST_METHOD'],  $_SERVER['REQUEST_URI'] , $_GET , $_POST);
    }

    /**
     * 
     * Return all the headers array;
     */
    public function getHeaders()
    {
        return $this->headers;
    }


    /**
     * 
     * 
     *  return the url of the request
     */
    public function url()
    {
        return explode('?' ,$this->uri)[0];
    }


    /**
     * 
     * 
     * 
     * Return the url of the previous page
     */
    public function previous()
    {
        return $this->getHeaders()['HTTP_REFERER'];
    }


    /**
     * 
     * Current method of the request
     * 
     */
    public function method()
    {
        return $this->method;
    }

    /**
     * 
     * 
     * Full query string
     */
    public function queryUrl()
    {
        return explode('?' ,$this->uri)[1];
    }

    /**
     * 
     * Full Url with Query String
     */
    public function fullUrl()
    {
        return $this->uri;
    }





    /**
     * 
     * Return the post parameters if any
     */
    public function input($key)
    {
        return  $this->parameters['post']->get($key);
    }

    
    /**
     * 
     * 
     * 
     * Return the url query parameters if any
     */
    public function query($key)
    {
        return $this->parameters['get']->get($key);        
    }




    
}