<?php

namespace App\Service;

use App\Entity\Components;
use App\Entity\Modules;
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

/*        $user = new User;
        $user->setName('Mr.Right');
        $user->setEmail("lo@l.com");
        $user->setAddress("3 rue des lilas");
        $user->setIsAdmin(false);
        $user->setSaltKey("sdf");
        $user->setPassword("dgkm");

        $this->em->merge($user);
        $this->em->flush();

        $comp= new Components();
        $comp->setName("comp1");
        $comp->setPercentage(1);



        //$this->em->clear();
        $this->em->merge($comp);
        $this->em->flush();

        $mod = new Modules();
        $mod->addUser($user);
        $mod->setAcronym("lkjh");
        $mod->setTitle("mlkjh");
        $mod->addComponent($comp);
        $this->em->merge($mod);
        $this->em->flush();


        $user->addModule($mod);

        $this->em->merge($user);
        $this->em->flush();*/


        //$this->em->flush();


        if (empty($id)) {
            return;
        }
        
        $user = $this->em->find('App\Entity\User',$id);
        $this->logger->debug('Get user '. $id);
        return $user;
    }



    /**
     * @param id the mail to search
     */
    public function getUserByMail( $mail)
    {

        if (empty($mail)) {
            return;
        }

        $users = $this->em->getRepository('App\Entity\User')->findBy(array('email' => $mail));




        $this->logger->debug('Get user '. $mail);
        $user=$users[0];
        return $user;
    }

    public function getAllUsers()
    {
        $users = $this->em->getRepository("App\Entity\User")->findAll();
        $this->logger->debug('Get all users ');
        return $users;
    }

/*    public function createUser(){
        //TODO
        $user = new User();
        $user->setName($newUsername);
        $entityManager->persist($user);
        $entityManager->flush();
    }*/
}