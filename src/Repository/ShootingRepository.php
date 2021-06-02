<?php

namespace App\Repository;

use App\Entity\Shooting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Shooting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shooting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shooting[]    findAll()
 * @method Shooting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShootingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shooting::class);
    }

    // /**
    //  * @return Shooting[] Returns an array of Shooting objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Shooting
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
