<?php
namespace App\Action\User;

use App\Service\UserService;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class GetUserAction
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
        $user = $this->userService->getUserById($args['id']);
        $this->logger->info('User retrieved '.$args['id'] );
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($user, 'json');
        $response = $response->withHeader('Content-type', 'application/json');
        $response->getBody()->write($jsonContent);

        return $response;
    }
}
