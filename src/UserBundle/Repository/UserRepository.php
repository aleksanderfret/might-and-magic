<?php

namespace GameBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function getUserGameRate(int $gameId, int $userId)
    {
        $query = $this->getEntityManager()->createQuery(
            "SELECT r.value AS userrate FROM GameBundle:GameUserRate g LEFT JOIN g.rate r WHERE g.game = :gid AND g.user = :uid"
        );
        $query->setParameter('gid', $gameId);
        $query->setParameter('uid', $userId);
            
        try {
            $resultArray = $query->getResult();
            if(!empty($resultArray)){
                $responseValue = $resultArray[0]['userrate'];
            } else {
                $responseValue = null;
            }
            return $responseValue;
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
