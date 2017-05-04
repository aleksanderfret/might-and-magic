<?php

namespace UserBundle\Model;

interface GameUserRateInterface
{
    public function setGame(\GameBundle\Entity\Game $game);
    
    public function getGame();
    
    public function setRate(\GameBundle\Entity\Rate $rate);

    public function getRate();

    public function setUser(\UserBundle\Entity\User $user);
   
    public function getUser();
}
