<?php

namespace App\Repository;

use App\Entity\Cheval;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Cheval>
 *
 * @method Cheval|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cheval|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cheval[]    findAll()
 * @method Cheval[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChevalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cheval::class);
    }

   /**
    * @return Cheval[] Returns an array of Cheval objects
    */
   public function listeChevauxComplete() : array
   {
        return $this->createQueryBuilder('cheval')
        ->select('cheval')
        ->getQuery()
        ->getResult()
       ;
   }
}
