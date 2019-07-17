<?php
namespace App\Action\User;

use App\Service\UserService;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class CreateUserAction
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(UserService $userService, LoggerInterface $logger)
    {
        $this->userService = $userService;
        $this->logger = $logger;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $this->logger->info($request);
        $user = $this->userService->getUserById(5);
        $this->logger->info('User retrieved '.$args['id'] );
        $response = $response->withJson($user);
        return $response;
    }
}
