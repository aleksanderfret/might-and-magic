<?php

namespace UserBundle\Model;

interface AuthorInterface
{
    public function getId();
    
    public function setNick($nick);
    
    public function getNick();    
   
    public function addGameAuthorWork(\GameBundle\Entity\GameAuthorWork $gameAuthorWork);
    
    public function removeGameAuthorWork(\GameBundle\Entity\GameAuthorWork $gameAuthorWork);
    
    public function getGameAuthorWork();
    
    public function setUser(\UserBundle\Entity\User $user = null);
    
    public function getUser();
}
