<?php

namespace Framework\View;

use Framework\Http\Response;


class View extends Response{

    protected $path;
    protected $variables;

    public function __construct($path , $variables = [] , $statusCode = 200 , $headers = array())
    {
        parent::__construct(null , $statusCode , $headers );
        $this->path = views_path($path) . '.php' ;
        $this->variables = $variables;
    }

    /**
     * 
     * 
     * Override the method Response Send Method
     */
    public function send()
    {
        $this->render();
        parent::send();
    }


    public function render()
    {
        extract($this->variables());

        ob_start();
            require $this->path() ;
        $this->setContent( ob_get_clean() );
        ob_end_clean();
        return $this->content();
    }


    /**
     * 
     * 
     * Add up all the parameters needed for the view
     */
    public function with($key , $value)
    {
        $this->variables[$key] = $value;
        return $this;
    }

    /**
     * 
     * return the path to the view
     */
    public function path()
    {
        return $this->path;
    }

    /**
     * 
     * 
     * return the variables of the view
     */
    public function variables()
    {
        return $this->variables;
    }




}