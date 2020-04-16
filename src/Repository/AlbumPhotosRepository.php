<?php

namespace App\Repository;

use App\Entity\AlbumPhotos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AlbumPhotos|null find($id, $lockMode = null, $lockVersion = null)
 * @method AlbumPhotos|null findOneBy(array $criteria, array $orderBy = null)
 * @method AlbumPhotos[]    findAll()
 * @method AlbumPhotos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlbumPhotosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AlbumPhotos::class);
    }

    // /**
    //  * @return AlbumPhotos[] Returns an array of AlbumPhotos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AlbumPhotos
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
