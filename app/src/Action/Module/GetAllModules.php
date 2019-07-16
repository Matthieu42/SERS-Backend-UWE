<?php
namespace App\Action\Module;

use App\Service\ModuleService;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class GetAllModules
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
    
        $modules = $this->moduleService->getAllModules();
        $response = $response->withJson($modules);
        return $response;
    }
}
