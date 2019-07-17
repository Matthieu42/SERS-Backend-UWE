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

    public function getAllModulesWithData()
    {
        $modules = $this->em->getRepository("App\Entity\Modules")->findAll();
        $this->logger->debug('Get all modules ');
        return $modules;
    }

    public function getAllModules()
    {
        $qb = $this->em->createQueryBuilder();
        $fields = array('m.id', 'm.title', 'm.acronym');
        $qb->select($fields)
           ->from('App\Entity\Modules', 'm');
        $query = $qb->getQuery();
        $modules = $query->getResult();
        $this->logger->debug('Get all modules ');
        return $modules;
    }


     /**
     * @param id the id to search
     */
    public function getModuleById( $id)
    {
        if (empty($id)) {
            return;
        }
        $module = $this->em->getRepository('App\Entity\Modules')->find($id);
        $this->logger->debug('Get module '. $id);

        return $module;
    }
}