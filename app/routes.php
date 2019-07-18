<?php
use Slim\Http\Request;
use Slim\Http\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app->get('/', App\Action\DefaultAction::class);

$app->get('/user/[{id}]', App\Action\User\GetUserAction::class);
$app->post('/user', App\Action\User\CreateUserAction::class);
$app->get('/users', App\Action\User\GetAllUsersAction::class);
$app->get('/modules/data', App\Action\Module\GetAllModulesWithDataAction::class);
$app->get('/modules', App\Action\Module\GetAllModulesAction::class);
$app->get('/NoteExams/user/[{id}]', App\Action\NoteExams\GetNoteExamForUserAction::class);
$app->get('/user/mail/[{mail}]', App\Action\User\GetUserWithMail::class);
$app->get('/NoteExams/module/[{id}]', App\Action\NoteExams\GetNoteExamForModuleAction::class);
$app->get('/module/user/[{id}]', App\Action\Module\GetModulesForUser::class);

$app->post('/login', \App\Action\User\userLogin::class);
$app->post('/signup', \App\Action\User\userSignUp::class);

$app->get('/NoteExams/module/user/[{idUser}[/{idModule}]]', App\Action\NoteExams\GetNoteExamsForUserModuleAction::class);

$app->get('/component/module/[{id}]', App\Action\Component\GetComponentForModule::class);