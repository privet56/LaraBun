<?php
echo "a";
require __DIR__.'/../vendor/autoload.php';
echo "b";
$app = require_once __DIR__.'/../bootstrap/app.php';
echo "c";
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
echo "d";
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);
echo "e";
error_log("error_log");
$response->send();
echo "f";
$kernel->terminate($request, $response);
echo "g";