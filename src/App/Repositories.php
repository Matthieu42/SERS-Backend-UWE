<?php declare(strict_types=1);

use App\Repository\UserRepository;
use App\Repository\TaskRepository;
use App\Repository\NoteRepository;
use Psr\Container\ContainerInterface;

$container = $app->getContainer();

$container['user_repository'] = function (ContainerInterface $container): UserRepository {
    return new UserRepository($container->get('db'));
};
