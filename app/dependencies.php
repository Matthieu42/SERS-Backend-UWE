<?php
// DIC configuration

use App\Action\User\GetUserWithMail;
use App\Action\User\userLogin;

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new \Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
    $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['logger']['path'], $settings['logger']['level']));
    return $logger;
};

// Doctrine
$container['em'] = function ($c) {
    $settings = $c->get('settings');
    $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
        $settings['doctrine']['meta']['entity_path'],
        $settings['doctrine']['meta']['auto_generate_proxies'],
        $settings['doctrine']['meta']['proxy_dir'],
        $settings['doctrine']['meta']['cache'],
        false
    );
    return \Doctrine\ORM\EntityManager::create($settings['doctrine']['connection'], $config);
};

// Doctrine

$container['moduleService'] = function ($c) {
    return new \App\Service\ModuleService($c->get('em'), $c->get('logger'));
};
$container['userService'] = function ($c) {
    return new \App\Service\UserService($c->get('em'), $c->get('logger'),$c->get('moduleService'));
};
$container[App\Action\DefaultAction::class] = function ($c) {
    return new App\Action\DefaultAction( $c->get('logger'));
};

$container[App\Action\User\GetUserAction::class] = function ($c) {
    return new App\Action\User\GetUserAction($c->get('userService'), $c->get('logger'));
};

$container[App\Action\User\CreateUserAction::class] = function ($c) {
    return new App\Action\User\CreateUserAction($c->get('userService'), $c->get('logger'));
};

$container[App\Action\User\GetAllUsersAction::class] = function ($c) {
    return new App\Action\User\GetAllUsersAction($c->get('userService'), $c->get('logger'));
};

$container[App\Action\Module\GetAllModulesAction::class] = function ($c) {
    return new App\Action\Module\GetAllModulesAction($c->get('moduleService'), $c->get('logger'));
};

$container[App\Action\Module\GetAllModulesWithDataAction::class] = function ($c) {
    return new App\Action\Module\GetAllModulesWithDataAction($c->get('moduleService'), $c->get('logger'));
};

$container[App\Action\NoteExams\GetNoteExamForUserAction::class] = function ($c) {
    return new App\Action\NoteExams\GetNoteExamForUserAction($c->get('userService'), $c->get('logger'));
};

$container[App\Action\User\GetUserWithMail::class] = function ($c) {
    return new App\Action\User\GetUserWithMail($c->get('userService'), $c->get('logger'));
};
$container[App\Action\NoteExams\GetNoteExamForModuleAction::class] = function ($c) {
    return new App\Action\NoteExams\GetNoteExamForModuleAction($c->get('moduleService'), $c->get('logger'));
};
$container[App\Action\NoteExams\GetNoteExamForModuleWithDataAction::class] = function ($c) {
    return new App\Action\NoteExams\GetNoteExamForModuleWithDataAction($c->get('moduleService'), $c->get('logger'));
};
$container[App\Action\Module\GetModulesForUser::class] = function ($c) {
    return new App\Action\Module\GetModulesForUser($c->get('userService'), $c->get('logger'));
};

$container[App\Action\User\userLogin::class] = function ($c) {
    return new App\Action\User\userLogin($c->get('userService'), $c->get('logger'));
};

$container[App\Action\User\userSignUp::class] = function ($c) {
    return new App\Action\User\userSignUp($c->get('userService'), $c->get('logger'));
};

$container[App\Action\NoteExams\GetNoteExamsForUserModuleAction::class] = function ($c) {
    return new App\Action\NoteExams\GetNoteExamsForUserModuleAction($c->get('userService'), $c->get('logger'));
};

$container[App\Action\Component\GetComponentForModule::class] = function ($c) {
    return new App\Action\Component\GetComponentForModule($c->get('moduleService'), $c->get('logger'));
};