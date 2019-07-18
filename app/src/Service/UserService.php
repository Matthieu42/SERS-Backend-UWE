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
use JMS\Serializer;
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
        $user = $this->em->getRepository('App\Entity\User')->find($id);
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
        if (isset($users[0])) {
            $user = $users[0];
            return $user;

        }
        else{
            return null;
        }
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

    public function userLogin($request)
    {
        $value = json_decode($request->getBody());
        $valuePwd = $value->password;
        $usr = $this->getUserByMail($value->mail);
        $rep = [];
        if ($usr!==null){
            $pwdEntity = $usr->getPassword();
            if (password_verify($valuePwd,$pwdEntity )) {
                $rep['answer']="truepassword";

            } else {
                $rep['answer']="falsepassword";
            }
        }
        else{
            $rep['answer']="falsemail";

        }
        return $rep;


        /*        if (password_verify($valuePwd, $enc)) {
                    return "password encrypted";
                } else {
                    return "error during password encryption";
                }*/

    }

    public function userSignUp($request)
    {
        $value = json_decode($request->getBody());
        //$value= json_encode($value);
        $pwd = $value->password;
        $name = $value->name;
        $address = $value->address;
        $mail = $value->mail;
        $rep = [];
        $enc = password_hash($pwd, PASSWORD_BCRYPT);
        if ($pwd!==null && $name!==null && $address!==null && $mail!==null) {
            $usr = new User();
            $usr->setName($name);
            $usr->setPassword($enc);
            $usr->setAddress($address);
            $usr->setEmail($mail);
            $usr->setSaltKey("useless");
            $usr->setIsAdmin(false);
            $this->em->persist($usr);
            $this->em->flush();

            $rep['answer']="success";
        }
        else{
            $rep['answer']="failure";
        }

        return $rep;

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
        $sql = "SELECT  M.ID, M.Acronym, N.note, M.title as module, C.name as component FROM NoteExam N JOIN Exam E on N.exam_id = E.id JOIN Components C on E.component_id = C.id JOIN Modules M on C.modules_id = M.id WHERE user_id=?";
        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt->execute(array($id));
        $result = $stmt->fetchAll();
        $this->logger->debug('Get note for user'. $id);
        $modules = array();
        foreach($result as $note){
            if(!array_key_exists($note['ID'],$modules)){
                $module = array();
            }else{
                $module = $modules[$note['ID']];
            }
            $tempComp['component'] = $note['component'];
            $tempComp['note']= $note['note'];
            $module['marks'][] = $tempComp;

            $module['ID'] = $note['ID'];
            $module['Acronym'] = $note['Acronym'];
            $module['title'] = $note['module'];
            $modules[$note['ID']] = $module;
        }
        return $modules;
    }



}