<?php

namespace App\Repository;

use App\Entity\Chat;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Chat>
 *
 * @method Chat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Chat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Chat[]    findAll()
 * @method Chat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Chat::class);
    }

    /**
    * @return Chat[] Returns an array of Chat objects
    */
    public function listeChatsComplete(): array
    {
        return $this->createQueryBuilder('chat')
        ->select('chat')
        ->getQuery()
        ->getResult()
        ;
    }

    //    public function findOneBySomeField($value): ?Chat
//    {
//        return $this->createQueryBuilder('chat')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
