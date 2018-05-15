<?php

namespace Framework\Routing\Contracts;

use Framework\Http\Request;


interface RouteResponsibilityContract{

    public function canHandleRequest(Request $request);
    public function hasName($name);

}