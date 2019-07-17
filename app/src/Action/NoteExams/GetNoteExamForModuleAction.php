<?php
namespace App\Action\NoteExams;

use App\Service\ModuleService;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use JMS\Serializer\SerializationContext;

final class GetNoteExamForModuleAction
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
        $user = $this->moduleService->getModuleByid($args['id']);
        
        $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($user, 'json', SerializationContext::create()->setGroups(array('moduleNoteExams')));
        $response = $response->withHeader('Content-type', 'application/json');
        $this->logger->info('Exam note retrieved '. $args['id'] );
        $response->getBody()->write($jsonContent);
        return $response;
    }
}
