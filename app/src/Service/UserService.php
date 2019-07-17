<?php

namespace App\Service;

use App\Entity\Components;
use App\Entity\Modules;
use App\Entity\User;
use App\Entity\NoteExam;
use Doctrine\ORM\EntityManager;
use Psr\Log\LoggerInterface;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\ResultSetMapping;
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
        $query = $this->em
        ->getRepository("App\Entity\User")
        ->createQueryBuilder('U')
        ->where('U.id = :id')
        ->setParameter('id', $id)
        ->getQuery();
        $user = $query->getArrayResult();
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
        $query = $this->em
                      ->getRepository("App\Entity\User")
                      ->createQueryBuilder('U')
                      ->getQuery();
        $result = $query->getArrayResult();
        $this->logger->debug('Get all users ');
        return $result;
    }

/*    public function createUser(){
        //TODO
        $user = new User();
        $user->setName($newUsername);
        $entityManager->persist($user);
        $entityManager->flush();
    }
*/
    public function getNoteExamsForUser($id)
    {
        if (empty($id)) {
            return;
        }
        $sql = " 
        SELECT N.note, M.title, C.name FROM NoteExam N JOIN Exam E on N.exam_id = E.id JOIN Components C on E.component_id = C.id JOIN Modules M on C.modules_id = M.id WHERE user_id=?";
        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt->execute(array($id));
        $result = $stmt->fetchAll();
        $this->logger->debug('Get note for user'. $id);
        return $result;
    }



}