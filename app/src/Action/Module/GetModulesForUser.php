<?php
namespace App\Action\Module;

use App\Service\UserService;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use JMS\Serializer\SerializationContext;

final class GetModulesForUser
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
        $jsonContent = $serializer->serialize($user, 'json', SerializationContext::create()->setGroups(array('moduleForUser')));
        $responseJSON = $response->withHeader('Content-type', 'application/json');
        
        $responseJSON->getBody()->write($jsonContent);
        return $responseJSON;
    }
}
