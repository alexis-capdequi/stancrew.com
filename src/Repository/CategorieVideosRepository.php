<?php

namespace App\Repository;

use App\Entity\CategorieVideos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieVideos|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieVideos|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieVideos[]    findAll()
 * @method CategorieVideos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieVideosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieVideos::class);
    }

    // /**
    //  * @return CategorieVideos[] Returns an array of CategorieVideos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategorieVideos
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
