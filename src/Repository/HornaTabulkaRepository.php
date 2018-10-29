<?php

namespace App\Repository;

use App\Entity\HornaTabulka;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HornaTabulka|null find($id, $lockMode = null, $lockVersion = null)
 * @method HornaTabulka|null findOneBy(array $criteria, array $orderBy = null)
 * @method HornaTabulka[]    findAll()
 * @method HornaTabulka[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HornaTabulkaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HornaTabulka::class);
    }

//    /**
//     * @return HornaTabulka[] Returns an array of HornaTabulka objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HornaTabulka
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
