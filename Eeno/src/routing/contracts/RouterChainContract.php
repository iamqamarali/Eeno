<?php

namespace Eeno\Routing\Contracts;

use Eeno\Http\Request;



interface RouterChainContract{

    public function handleRequest( Request $request);

    public function register(RouteresponsibilityContract $route);

    public function handleName($name);

}