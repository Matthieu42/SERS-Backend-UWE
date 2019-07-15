<?php

namespace App\Repository;

use App\Entity\NoteExam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NoteExam|null find($id, $lockMode = null, $lockVersion = null)
 * @method NoteExam|null findOneBy(array $criteria, array $orderBy = null)
 * @method NoteExam[]    findAll()
 * @method NoteExam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoteExamRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NoteExam::class);
    }

    // /**
    //  * @return NoteExam[] Returns an array of NoteExam objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NoteExam
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
