<?php declare(strict_types=1);

use App\Service\UserService;
use App\Service\TaskService;
use App\Service\NoteService;
use Psr\Container\ContainerInterface;

$container = $app->getContainer();

$container['user_service'] = function (ContainerInterface $container): UserService {
    return new UserService($container->get('user_repository'));
};

