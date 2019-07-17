<?php
// DIC configuration

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
$container['userService'] = function ($c) {
    return new \App\Service\UserService($c->get('em'), $c->get('logger'));
};
$container['moduleService'] = function ($c) {
    return new \App\Service\ModuleService($c->get('em'), $c->get('logger'));
};

$container[App\Action\DefaultAction::class] = function ($c) {
    return new App\Action\DefaultAction( $c->get('logger'));
};

$container[App\Action\User\GetUserWithModulesAction::class] = function ($c) {
    return new App\Action\User\GetUserWithModulesAction($c->get('userService'), $c->get('logger'));
};

$container[App\Action\User\CreateUserAction::class] = function ($c) {
    return new App\Action\User\CreateUserAction($c->get('userService'), $c->get('logger'));
};

$container[App\Action\User\GetAllUsersWithModulesAction::class] = function ($c) {
    return new App\Action\User\GetAllUsersWithModulesAction($c->get('userService'), $c->get('logger'));
};

$container[App\Action\Module\GetAllModulesWithDataAction::class] = function ($c) {
    return new App\Action\Module\GetAllModulesWithDataAction($c->get('moduleService'), $c->get('logger'));
};

$container[App\Action\Module\GetAllModules::class] = function ($c) {
    return new App\Action\Module\GetAllModules($c->get('moduleService'), $c->get('logger'));
};

$container[App\Action\User\GetUserWithMail::class] = function ($c) {
    return new App\Action\User\GetUserWithMail($c->get('userService'), $c->get('logger'));
};