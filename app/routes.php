<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/', App\Action\DefaultAction::class);

$app->get('/user/[{id}]', App\Action\User\GetUserAction::class);