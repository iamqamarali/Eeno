<?php

namespace Framework\Routing\Contracts;

use Framework\Http\Request;



interface RouterChainContract{

    public function handleRequest( Request $request);

    public function register(RouteresponsibilityContract $route);

    public function handleName($name);

}