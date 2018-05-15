<?php

namespace Framework\Routing\Contracts;

interface RouteInterface{
    public function name($name = null);
    public function controller();
    public function method();
    public function function();
    public function url();
}