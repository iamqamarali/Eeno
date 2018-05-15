<?php

use Framework\Http\Request;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Framework/src/helpers/helpers.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$response = $app->handle(
    $request = Request::capture()
);

$response->send();


exit(0);
