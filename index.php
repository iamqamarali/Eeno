<?php

use Eeno\Http\Request;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Eeno/src/helpers/helpers.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$response = $app->handle(
    Request::capture()
);    

$response->send();
 

exit(0);
