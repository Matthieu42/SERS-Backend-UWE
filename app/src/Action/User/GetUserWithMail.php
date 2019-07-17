<?php
namespace App\Action\User;

use App\Service\UserService;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class GetUserWithMail
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
        $user = $this->userService->getUserByMail($args['mail']);
        $this->logger->info('User retrieved '.$args['mail'] );
        $response = $response->withJson($user);
        return $response;
    }
}
