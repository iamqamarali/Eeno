<?php

namespace Eeno\Support\Facade;

class DB extends Facade{

    public static $db = null;

    public static function raw($query , $params = [])
    {
        if(! self::$db )
            $db = self::$db = resolve('database');
        $db->raw($query , $params);
    }

}