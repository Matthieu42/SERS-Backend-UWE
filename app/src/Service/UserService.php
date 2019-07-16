<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Psr\Log\LoggerInterface;

class UserService
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

    /**
     * @param id the id to search
     */
    public function getUserById( $id)
    {
        if (empty($id)) {
            return;
        }
        
        $user = $this->em->find('App\Entity\User',$id);
        $modules = $this->em->find('App\Entity\User',$id);
        $this->logger->debug('Get user '. $id);
        return $user;
    }

    public function createUser(){
        //TODO
        $user = new User();
        $user->setName($newUsername);
        $entityManager->persist($user);
        $entityManager->flush();
    }
}