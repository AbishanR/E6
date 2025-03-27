<?php

namespace App\Repository;

use App\Entity\Chien;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Chien>
 *
 * @method Chien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chien[]    findAll()
 * @method Chien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChienRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chien::class);
    }

   /**
    * @return Chien[] Returns an array of Chien objects
    */
    public function listeChiensComplete() : array
    {
         return $this->createQueryBuilder('chien')
         ->select('chien')
         ->getQuery()
         ->getResult()
        ;
    }
}
