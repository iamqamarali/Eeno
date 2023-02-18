<?php

namespace App\Models;

use Eeno\Support\Model;


class User extends Model {

    protected $data ;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }


}