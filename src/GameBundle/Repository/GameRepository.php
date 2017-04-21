<?php

namespace GameBundle\Repository;

use Doctrine\ORM\EntityRepository;

class GameRepository extends EntityRepository
{
    public function getTitleCoverNoteRate()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM GameBundle:Game p ORDER BY p.id ASC'
            )
            ->getResult();
    }
}
