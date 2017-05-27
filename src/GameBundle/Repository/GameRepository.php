<?php

namespace GameBundle\Repository;

use Doctrine\ORM\EntityRepository;
use GameBundle\Entity\Game;

class GameRepository extends EntityRepository
{
    public function getUserGameRate(int $gameId, int $userId)
    {
        $query = $this->getEntityManager()->createQuery(
            "SELECT r.value AS userrate FROM GameBundle:GameUserRate g "
                . "LEFT JOIN g.rate r WHERE g.game = :gid AND g.user = :uid"
        );
        $query->setParameter('gid', $gameId);
        $query->setParameter('uid', $userId);
            
        try {
            $resultArray = $query->getOneOrNullResult();
            if (!empty($resultArray)) {
                $responseValue = $resultArray['userrate'];
            } else {
                $responseValue = null;
            }
            return $responseValue;
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
    
    public function calculateVotesAndAverageRate(int $gameId)
    {
        $query = $this->getEntityManager()->createQuery(
            "SELECT AVG(r.value) AS average, COUNT(r.value) AS votes "
                . "FROM GameBundle:GameUserRate gur "
                . "LEFT JOIN gur.rate r WHERE gur.game = :gid"
        );
        $query->setParameter('gid', $gameId);
            
        try {
            $resultArray = $query->getResult();
            $responseArray = [
                'avg' =>$resultArray[0]['average'],
                'num'=>$resultArray[0]['votes']
            ];
            return $responseArray;
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
    
    public function calculateRankingPosition(int $gameId)
    {
        $query = $this->getEntityManager()->createQuery(
            "SELECT g.id, g.avg, g.votes "
                . "FROM GameBundle:Game g ORDER BY g.avg DESC, g.votes DESC");
        
        try {
            $resultArray = $query->getResult();
            $previous = 1;
            $ranking=[];
            if (!empty($resultArray)) {
                foreach ($resultArray as $key => $result) {
                    if ($key == 0
                        || ($result['avg'] == $resultArray[$key-1]['avg']
                        && $result['votes'] == $resultArray[$key-1]['votes'])) {
                        $ranking[$result['id']] = $previous;
                    } else {
                        $previous++;
                        $ranking[$result['id']] = $previous;
                    }
                }
                if (isset($ranking[$gameId])) {
                    $rankingPosition = $ranking[$gameId];
                } else {
                    $rankingPosition = null;
                }
            }
            return $rankingPosition;
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
            
    public function getGamesRatesforAuthorsOfComments(int $gameId)
    {
        $query = $this->getEntityManager()
            ->createQuery(
                "SELECT DISTINCT IDENTITY(c.author, 'id') AS author,"
                    . " r.value AS rate FROM GameBundle:Comment c"
                    . " LEFT JOIN GameBundle:GameUserRate g"
                    . " WITH c.author = g.user LEFT JOIN g.rate r"
                    . " WHERE g.game = :gid"
                );
            $query->setParameter('gid', $gameId);
        try {
            $resultArray = $query->getResult();
            $ratesByAuthorsOfComments=[];
            foreach ($resultArray as $row) {
                $ratesByAuthorsOfComments[$row['author']] = $row['rate'];
            }
            return $ratesByAuthorsOfComments;
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
    
    public function getAuthors(int $gameId)
    {
        $query = $this->getEntityManager()->createQuery(
            "SELECT a.nick AS author, w.work"
                . " FROM GameBundle:GameAuthorWork g"
                . " LEFT JOIN g.author a LEFT JOIN g.work w"
                . " WHERE g.game = :gid"
        );
        $query->setParameter('gid', $gameId);
        $i = 0;
        $j = 0;
        $authors = ['author' => [], 'editor' => [], 'otsher' => []];
        try {
            $resultArray = $query->getResult();
            foreach ($resultArray as $key => $value) {
                if ($value['work'] == 'autorstwo') {
                    $authors['author'][$i] = $value['author'];
                    $i++;
                } else {
                    $authors['editor'][$j] = $value['author'];
                    $j++;
                }
            }
            $authors['editor'] = array_unique($authors['editor']);
            natcasesort ($authors['author']);
            natcasesort ($authors['editor']);
            return $authors;
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }
}
