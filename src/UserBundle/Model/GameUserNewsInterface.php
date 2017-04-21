<?php

namespace UserBundle\Model;

interface GameUserNewsInterface
{
    public function setGame(\GameBundle\Entity\Game $game);
    
    public function getGame();
    
    public function setNews(\GameBundle\Entity\News $news);
    
    public function getNews();
    
    public function setUser(\GameBundle\Entity\User $user);
    
    public function getUser();
}
