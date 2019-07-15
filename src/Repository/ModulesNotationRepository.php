<?php

namespace App\Repository;

use App\Entity\ModulesNotation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ModulesNotation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModulesNotation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModulesNotation[]    findAll()
 * @method ModulesNotation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModulesNotationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ModulesNotation::class);
    }

    // /**
    //  * @return ModulesNotation[] Returns an array of ModulesNotation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ModulesNotation
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
