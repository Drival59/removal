<?php

namespace RemovalBundle\Repository;

/**
 * CommentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommentRepository extends \Doctrine\ORM\EntityRepository
{
  public function myFindAll($new)
  {
    $qb = $this->createQueryBuilder('c');
    $qb->where('c.news = :new');
    $qb->orderBy('c.dateComment', 'DESC');
    $qb->setParameter('new', $new);
    $qb->setMaxResults(10);
    return $qb
      ->getQuery()
      ->getResult()
    ;
  }

  public function showMoreComments($new, $fc)
  {
    $qb = $this->createQueryBuilder('c');
    $qb->where('c.news = :new');
    $qb->orderBy('c.dateComment', 'DESC');
    $qb->setParameter('new', $new);
    $qb->setFirstResult($fc);
    $qb->setMaxResults(10);
    return $qb
      ->getQuery()
      ->getResult()
    ;
  }

  public function myFindOneByCommentUser($commentId, $user)
  {
    $qb = $this->createQueryBuilder('c');
    $qb->where('c.id = :commentId');
    $qb->andWhere('c.utilisateur = :user');
    $qb->setParameter('commentId', $commentId);
    $qb->setParameter('user', $user);
    return $qb
      ->getQuery()
      ->getResult()
    ;
  }

}
