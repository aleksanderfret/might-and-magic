<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class GameRepository extends EntityRepository
{
    public function findTitleCoverNoteRate()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p FROM AppBundle:Game p ORDER BY p.id ASC'
            )
            ->getResult();
    }    
}
