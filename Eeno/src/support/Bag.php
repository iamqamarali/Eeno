<?php

namespace Eeno\Support;


class Bag{

    private $storage;

    public function __construct(array $elms)
    {
        $this->storage = $elms;
    }

    public function storage()
    {
        return $this->storage;
    }

    public function set($key , $value)
    {
        $this->storage[$key] = $value;
    }


    public function get($key)
    {
        return isset($this->storage[$key]) ? $this->storage[$key] : null;
    }

    public function __toString()
    {
        return json_encode($this->storage);
    }

}