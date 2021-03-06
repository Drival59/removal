<?php

namespace RemovalBundle\Repository;

/**
 * JoueurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class JoueurRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAllByUser($joueurID){
        $qb = $this->createQueryBuilder('j')->leftJoin('j.utilisateur', 'u')->addSelect('u')
            ->where('u.id = :id');
        $qb->setParameter('id', $joueurID);

        return $qb->getQuery()->getResult();
    }
}
