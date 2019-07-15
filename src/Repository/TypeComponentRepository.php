<?php

namespace App\Repository;

use App\Entity\TypeComponent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeComponent|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeComponent|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeComponent[]    findAll()
 * @method TypeComponent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeComponentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeComponent::class);
    }

    // /**
    //  * @return TypeComponent[] Returns an array of TypeComponent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeComponent
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
