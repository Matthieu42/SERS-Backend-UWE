<?php declare(strict_types=1);

use App\Handler\ApiError;
use Psr\Container\ContainerInterface;

$container = $app->getContainer();


$container['redis'] = function (): \Predis\Client {
    return new \Predis\Client(getenv('REDIS_URL'));
};

$container['errorHandler'] = function (): ApiError {
    return new ApiError;
};
