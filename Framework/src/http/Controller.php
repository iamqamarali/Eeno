<?php

namespace Framework\Http;

use Framework\Http\Request;


class Controller {

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

}