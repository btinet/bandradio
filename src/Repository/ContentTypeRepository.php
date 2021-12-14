<?php

namespace App\Repository;

use App\Entity\ContentType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContentType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentType[]    findAll()
 * @method ContentType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentType::class);
    }

     /**
      * @return ContentType[] Returns an array of ContentType objects
      */

    public function findViews($value): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('views.id = :val')
            ->andWhere('posts.isPublished = :isPublished')
            ->setParameter('val', $value)
            ->setParameter('isPublished', true)
            ->join('c.views','views')
            ->join('c.posts','posts')
            ->orderBy('posts.updated', 'desc')
            ->setMaxResults(100)
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?ContentType
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
