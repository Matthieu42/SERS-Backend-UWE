<?php

require __DIR__ . '/vendor/autoload.php';

$settings = require __DIR__ . '/app/settings.php';
$app = new \Slim\App($settings);
require __DIR__ . '/app/dependencies.php';
require __DIR__ . '/app/routes.php';
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', 'http://localhost:3000')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});
$app->run();
