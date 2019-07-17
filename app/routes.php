<?php
use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/', App\Action\DefaultAction::class);

$app->get('/user/[{id}]', App\Action\User\GetUserAction::class);
$app->post('/user', App\Action\User\CreateUserAction::class);
$app->get('/users', App\Action\User\GetAllUsersAction::class);
$app->get('/modules/data', App\Action\Module\GetAllModulesWithDataAction::class);
$app->get('/modules', App\Action\Module\GetAllModulesAction::class);
$app->get('/NoteExams/user/[{id}]', App\Action\NoteExams\GetNoteExamForUserAction::class);
$app->get('/user/mail/[{mail}]', App\Action\User\GetUserWithMail::class);