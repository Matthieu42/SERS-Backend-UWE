<?php
namespace App\Action\Component;

use App\Service\ModuleService;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use JMS\Serializer\SerializationContext;

final class GetComponentForModule
{
    /**
     * @var ModuleService
     */
    private $moduleService;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(ModuleService $moduleService, LoggerInterface $logger)
    {
        $this->moduleService = $moduleService;
        $this->logger = $logger;
    }

    public function __invoke(Request $request, Response $response, $args)
    {

        $modules = $this->moduleService->getModuleById($args['id']);
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($modules, 'json', SerializationContext::create()->setGroups(array('componentForModule')));
        $response = $response->withHeader('Content-type', 'application/json');

        $response->getBody()->write($jsonContent);
        return $response;
    }
}
