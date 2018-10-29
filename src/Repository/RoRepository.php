<?php

namespace App\Repository;

use App\Entity\Ro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ro|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ro|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ro[]    findAll()
 * @method Ro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ro::class);
    }

//    /**
//     * @return Ro[] Returns an array of Ro objects
//     */
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
    public function findOneBySomeField($value): ?Ro
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
