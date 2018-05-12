<?php

use Framework\Http\Request;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Framework/src/helpers/helpers.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$response = $app->handle(
    $request = Request::capture()
);

$response->send();


class a {

    protected $name;

    public function __construct($name)
    {
        $this->setName($name);
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function name()
    {
        return $this->name;
    }

}

class b extends a{

    public function __construct($name)
    {
        parent::__construct($name);
    }

}



exit(0);

