<?php

namespace App\Repository;

use App\Entity\PieceJoint;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PieceJoint>
 *
 * @method PieceJoint|null find($id, $lockMode = null, $lockVersion = null)
 * @method PieceJoint|null findOneBy(array $criteria, array $orderBy = null)
 * @method PieceJoint[]    findAll()
 * @method PieceJoint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PieceJointRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PieceJoint::class);
    }

//    /**
//     * @return PieceJoint[] Returns an array of PieceJoint objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PieceJoint
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
