<?php

namespace GameBundle\Model;

interface UserInterface
{
    public function getId();
    
    public function getUsername();
    
    public function setUsername($username);
    
    public function getEmail();
    
    public function setEmail($email);
    
    public function getPassword(); # TODO could by deleted?
    
    public function setPassword($password); # TODO could by deleted?

    public function getName();
    
    public function setName($name);
    
    public function getSurname();
    
    public function setSurname($surname);
    
    public function getLastLogin(); # TODO could by deleted?
    
    public function getRoles(); # TODO could by deleted?
    
    public function getRegDate(); # TODO could by deleted?
    
    public function getAvatar();
    
    public function setAvatar();
    
    public function getSid();
    
    public function setSid($sid);
    
    public function getTimestamp(); # TODO could by deleted?
    
    public function getValidationCode(); # TODO could by deleted?
    
    public function addComment(\GameBundle\Entity\Comment $comment);
    
    public function removeComment(\GameBundle\Entity\Comment $comment);
    
    public function getComment();
    
    public function setAuthor(\GameBundle\Entity\Author $author = null);
    
    public function getAuthor();
    
    public function addGameUserNews(\GameBundle\Entity\GameUserNews $gameUserNews);
    
    public function removeGameUserNews(\GameBundle\Entity\GameUserNews $gameUserNews);
    
    public function getGameUserNews();
    
    public function addGameUserRate(\GameBundle\Entity\GameUserRate $gameUserRate);
    
    public function removeGameUserRate(\GameBundle\Entity\GameUserRate $gameUserRate);
    
    public function getGameUserRate();
}
