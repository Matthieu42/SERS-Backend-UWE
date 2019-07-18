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

    public function getNoteForModule($id){
        if (empty($id)) {
            return;
        }
        $sql = "SELECT C.name,C.id as ComponentID,N.note, C.percentage
        FROM NoteExam N JOIN Exam E on N.exam_id = E.id JOIN Components C on E.component_id = C.id JOIN Modules M on C.modules_id = M.id
        WHERE modules_id=?";
        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt->execute(array($id));
        $result = $stmt->fetchAll();

        $components = array();
        foreach($result as $component){
            if(!array_key_exists($component['ComponentID'],$components)){
                $componentTemp = array();
                $componentTemp['marks'] = array();
            }else{
                $componentTemp = $components[$component['ComponentID']];
            }
            array_push($componentTemp['marks'],$component['note']);

            $componentTemp['ComponentID'] = $component['ComponentID'];
            $componentTemp['name'] = $component['name'];
            $componentTemp['percentage'] = $component['percentage'];
            $components[$component['ComponentID']] = $componentTemp;
        }

        $this->logger->debug('Get note for module'. $id);
        return [$components];
    }

    public function getNoteForModuleSimple($id){
        if (empty($id)) {
            return;
        }
        $sql = "SELECT N.note, C.percentage
        FROM NoteExam N JOIN Exam E on N.exam_id = E.id JOIN Components C on E.component_id = C.id JOIN Modules M on C.modules_id = M.id
        WHERE modules_id=?";
        $stmt = $this->em->getConnection()->prepare($sql);
        $stmt->execute(array($id));
        $result = $stmt->fetchAll();

        $this->logger->debug('Get note for module'. $id);
        return $result;
    }
}