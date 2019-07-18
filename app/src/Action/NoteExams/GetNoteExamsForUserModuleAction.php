<?php
namespace App\Action\NoteExams;

use App\Service\UserService;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use JMS\Serializer\SerializationContext;

final class GetNoteExamsForUserModuleAction
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
        $notes = $this->userService->getNoteExamsForUserModule($args['idUser'],$args['idModule']);
        //$serializer = \JMS\Serializer\SerializerBuilder::create()->build();
        //$jsonContent = $serializer->serialize($notes, 'json');
        $jsonContent = json_encode($notes);
        $response = $response->withHeader('Content-type', 'application/json');
        $this->logger->info('Exam note retrieved '. $args['idUser'] );
        $response->getBody()->write($jsonContent);
        return $response;
    }
}
