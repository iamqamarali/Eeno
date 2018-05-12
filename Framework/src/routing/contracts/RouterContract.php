<?php

namespace Framework\Routing\Contracts;


interface RouterContract{

    public function handleUrl($url);

    public function register(RouteContract $route);

}