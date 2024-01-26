<?php

namespace App\Repository;

use App\Entity\StateRelation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StateRelation>
 *
 * @method StateRelation|null find($id, $lockMode = null, $lockVersion = null)
 * @method StateRelation|null findOneBy(array $criteria, array $orderBy = null)
 * @method StateRelation[]    findAll()
 * @method StateRelation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StateRelationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StateRelation::class);
    }

//    /**
//     * @return StateRelation[] Returns an array of StateRelation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?StateRelation
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
