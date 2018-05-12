<?php


class RedirectResponse extends Response{


    public function __construct()
    {
        
    }
    
    public static function redirect($url)
    {
        $this->setContent(sprintf(
                '<!DOCTYPE html>
                <html>
                    <head>
                        <meta charset="UTF-8" />
                        <meta http-equiv="refresh" content="0;url=%1$s" />

                        <title>Redirecting to %1$s</title>
                    </head>
                    <body>
                        Redirecting to <a href="%1$s">%1$s</a>.
                    </body>
                </html>' ,
                $url
        ));
        $this->send();
    }


}