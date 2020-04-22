<?php

namespace App\Repository;

use App\Entity\Photo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Photo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Photo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Photo[]    findAll()
 * @method Photo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Photo::class);
    }

    public function findByAlbum($code_album): ?Photo
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.album_photos = :code_album')
            ->orderBy('p.date_publication', 'DESC')
            ->setParameter('code_album', $code_album)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
