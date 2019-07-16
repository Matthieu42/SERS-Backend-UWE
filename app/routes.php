<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/', App\Action\DefaultAction::class);

$app->get('/user/[{id}]', App\Action\User\GetUserWithModulesAction::class);
$app->post('/user/', App\Action\User\CreateUserAction::class);
$app->get('/users/', App\Action\User\GetAllUsersWithModulesAction::class);
$app->get('/modules/', App\Action\User\GetAllModules::class);