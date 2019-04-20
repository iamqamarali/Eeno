<?php
namespace Eeno\Http;


class Response{

    protected $content;
    protected $statusCode;
    protected $headers;


    public function __construct($content , $statusCode = 200 , $headers = [])
    {
        $this->setContent( $content );
        $this->statusCode($statusCode);
        $this->headers = $headers;
    }

    /**
     * 
     * set the content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }
    
        
    /**
     * 
     * Return the content of the response;
     */
    public function content()
    {
        return $this->content;
    }


    /**
     * 
     * Add Additional headers
     */
    public function setHeader($name , $header = null)
    {
        if($header)
            $this->headers[$nam] = $header;
        return $this;
    }

    
    /**
     * 
     * Return all the headers
     */
    public function headers()
    {
        return $this->headers;
    }


    /**
    * 
     * set or return the status code
     */
    public function statusCode($statusCode = NULl)
    {
        if($statusCode){
            $this->statusCode = $statusCode;
            return $this;
        }
        return $this->statusCode;
    }

    /**
     * 
     * 
     * Send the response back to the user;
     */
    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();
    }


    /**
     * 
     * 
     * Send appropiate headers to the user;
     */
    private function sendHeaders()
    {
        http_response_code($this->statusCode);
        
        if(headers_sent())
            return ;

        foreach($this->headers as $name => $header)
            header($name . ": " . $header);
    }

    /**
     * 
     * Send the content to the user
     */
    private function sendContent()
    {
        echo $this->content;
    }



}