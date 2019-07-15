<?php declare(strict_types=1);

namespace App\Controller;

use Slim\Container;
use Slim\Http\Request;
use Slim\Http\Response;

class DefaultController extends BaseController
{
    const API_VERSION = '0.25.0';

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getHelp(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
        $url = getenv('APP_DOMAIN');
        $endpoints = [
            'tasks' => $url . '/api/v1/modules',
            'users' => $url . '/api/v1/marks',
            'notes' => $url . '/api/v1/users',
            'status' => $url . '/status',
            'this help' => $url . '',
        ];
        $message = [
            'endpoints' => $endpoints,
            'version' => self::API_VERSION,
            'timestamp' => time(),
        ];

        return $this->jsonResponse('success', $message, 200);
    }

    public function getStatus(Request $request, Response $response, array $args): Response
    {
        $this->setParams($request, $response, $args);
    
        
        $db = [
        
        ];
        $status = [
            'db' => $db,
            'version' => self::API_VERSION,
            'timestamp' => time(),
        ];

        return $this->jsonResponse('success', $status, 200);
    }
}
