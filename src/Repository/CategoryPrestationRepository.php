<?php

namespace App\Repository;

use App\Entity\CategoryPrestation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CategoryPrestation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryPrestation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryPrestation[]    findAll()
 * @method CategoryPrestation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryPrestationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CategoryPrestation::class);
    }

    // /**
    //  * @return CategoryPrestation[] Returns an array of CategoryPrestation objects
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
    public function findOneBySomeField($value): ?CategoryPrestation
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
