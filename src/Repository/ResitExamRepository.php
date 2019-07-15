<?php

namespace App\Repository;

use App\Entity\ResitExam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ResitExam|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResitExam|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResitExam[]    findAll()
 * @method ResitExam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResitExamRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ResitExam::class);
    }

    // /**
    //  * @return ResitExam[] Returns an array of ResitExam objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ResitExam
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
