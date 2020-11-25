<?php

namespace App\Repository;

use App\Entity\LivrableAtendus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LivrableAtendus|null find($id, $lockMode = null, $lockVersion = null)
 * @method LivrableAtendus|null findOneBy(array $criteria, array $orderBy = null)
 * @method LivrableAtendus[]    findAll()
 * @method LivrableAtendus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivrableAtendusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LivrableAtendus::class);
    }

    // /**
    //  * @return LivrableAtendus[] Returns an array of LivrableAtendus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LivrableAtendus
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
