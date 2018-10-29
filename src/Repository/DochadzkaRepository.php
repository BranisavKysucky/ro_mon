<?php

namespace App\Repository;

use App\Entity\Dochadzka;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Dochadzka|null find($id, $lockMode = null, $lockVersion = null)
 * @method Dochadzka|null findOneBy(array $criteria, array $orderBy = null)
 * @method Dochadzka[]    findAll()
 * @method Dochadzka[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DochadzkaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Dochadzka::class);
    }

//    /**
//     * @return Dochadzka[] Returns an array of Dochadzka objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Dochadzka
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
