<?php

namespace Eeno\Routing\Contracts;

use Eeno\Http\Request;


interface RouteResponsibilityContract{

    public function canHandleRequest(Request $request);
    public function hasName($name);

}