<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Post;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;

class PostRepository extends EntityRepository
{
    /**
     * @param Post $post
     * @return GenusNote[]
     */
    public function findAllRecentNotesForGenus(Post $post)
    {
        return $this->createQueryBuilder('genus_note')
          //  ->andWhere('genus_note.genus = :genus')
         //   ->setParameter('genus', $genus)
         //   ->andWhere('genus_note.createdAt > :recentDate')
          //  ->setParameter('recentDate', new \DateTime('-3 months'))
           // ->orderBy('genus_note.createdAt', 'DESC')
           ->getQuery()
           ->execute();
    }
}