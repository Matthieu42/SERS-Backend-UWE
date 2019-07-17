<?php
namespace App\Action\NoteExams;

use App\Service\UserService;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class GetNoteExamForUserAction
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
        $user = $this->userService->getNoteExamsForUser($args['id']);
        $this->logger->info('Exam note retrieved '.$args['id'] );
        $response = $response->withJson($user);
        return $response;
    }
}
