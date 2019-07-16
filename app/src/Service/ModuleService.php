<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Psr\Log\LoggerInterface;

class ModuleService
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    public function __construct(EntityManager $em, LoggerInterface $logger)
    {
        $this->em = $em;
        $this->logger = $logger;
    }

    public function getAllModules()
    {
        $modules = $this->em->getRepository("App\Entity\Modules")->findAll();
        $this->logger->debug('Get all modules ');
        return $modules;
    }
}