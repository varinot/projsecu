<?php

namespace App\Repository;

use App\Entity\Usercomments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Usercomments|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usercomments|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usercomments[]    findAll()
 * @method Usercomments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsercommentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usercomments::class);
    }

    // /**
    //  * @return Usercomments[] Returns an array of Usercomments objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Usercomments
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
