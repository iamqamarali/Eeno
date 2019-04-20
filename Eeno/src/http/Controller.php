<?php

namespace Eeno\Http;

use Eeno\Http\Request;


class Controller {

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

}