<?php

namespace App\Repository;

use App\Entity\UsersExercises;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsersExercises|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsersExercises|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsersExercises[]    findAll()
 * @method UsersExercises[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersExercisesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsersExercises::class);
    }

    // /**
    //  * @return UsersExercises[] Returns an array of UsersExercises objects
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
    public function findOneBySomeField($value): ?UsersExercises
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
