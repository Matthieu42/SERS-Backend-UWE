<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/', App\Action\DefaultAction::class);

$app->get('/user/[{id}]', App\Action\User\GetUserWithModulesAction::class);
$app->get('/user/mail/[{mail}]', App\Action\User\GetUserWithMail::class);

$app->post('/user', App\Action\User\CreateUserAction::class);
$app->get('/users', App\Action\User\GetAllUsersWithModulesAction::class);
$app->get('/modules/data', App\Action\Module\GetAllModulesWithDataAction::class);
$app->get('/modules', App\Action\Module\GetAllModules::class); 