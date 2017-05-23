<?php

namespace GameBundle\Repository;

use Doctrine\ORM\EntityRepository;

class GameRepository extends EntityRepository
{
    public function calculateVotesAndAverageRate(int $gameId)
    {
        $query = $this->getEntityManager()->createQuery(
            "SELECT AVG(r.value) AS average, COUNT(r.value) AS votes FROM GameBundle:GameUserRate gur LEFT JOIN gur.rate r WHERE gur.game = :gid"
        );
        $query->setParameter('gid', $gameId);
            
        try {
            $resultArray = $query->getResult();
            $responseArray = ['avg' =>$resultArray[0]['average'], 'num'=>$resultArray[0]['votes']];
            return $responseArray;
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
    
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
    
    
    public function getRankingPosition()
    {
        $query = $this->getEntityManager()->createQuery(
            "SELECT g.value AS position FROM GameBundle:Game g ASC WHERE g.game = :gid"
        );
        $query->setParameter('gid', $gameId);
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
            
    public function getGamesRatesforAuthorsOfComments(int $gameId)
    {
        $query = $this->getEntityManager()
            ->createQuery(
                "SELECT DISTINCT IDENTITY(c.author, 'id') AS user, r.value AS rate FROM GameBundle:Comment c LEFT JOIN GameBundle:GameUserRate g WITH c.author = g.user LEFT JOIN g.rate r WHERE g.game = :gid"
                );
            $query->setParameter('gid', $gameId);           

            #SELECT DISTINCT IDENTITY(c.author, 'id') AS aid, r.value FROM GameBundle:Comment c JOIN c.game g JOIN g.gameUserRate gur JOIN gur.rate r WHERE c.game = :gid AND c.author = gur.user
        try {
            return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
