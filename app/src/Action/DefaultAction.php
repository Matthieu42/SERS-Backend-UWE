<?php
namespace App\Action;

use App\Service\ProviderService;
use Psr\Log\LoggerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class DefaultAction
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->providerService = $providerService;
        $this->logger = $logger;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $this->logger->info('completed');
        $response->getBody()->write('Welcome to SERS API');
        return $response;
    }
}
