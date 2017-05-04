<?php

namespace UserBundle\Model;

interface CommentInterface
{
    public function getId();
    
    public function setComment($comment);
    
    public function getComment();
    
    public function setPublishedDate($addDate);
    
    public function getPublishedDate();
    
    public function setAuthor(\UserBundle\Entity\User $user = null);
    
    public function getAuthor();
    
    public function setGame(\GameBundle\Entity\Game $game = null);
    
    public function getGame();
    
    public function setAnswer(\GameBundle\Entity\Comment $answer = null);
    
    public function getAnswer();
    
    public function addAnswer(\GameBundle\Entity\Comment $answer);

    public function removeAnswer(\GameBundle\Entity\Comment $answer);
    
    public function addParentComment(\GameBundle\Entity\Comment $parentComment);
    
    public function removeParentComment(\GameBundle\Entity\Comment $parentComment);
    
    public function getParentComment();
    
    public function setParentComment(\GameBundle\Entity\Comment $parentComment = null);
}
