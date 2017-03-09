<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="gameAuthorWork", indexes={@ORM\Index(name="idx_gameAuthorWork_author_id", columns={"author_id"}), @ORM\Index(name="idx_gameAuthorWork_work_id", columns={"work_id"}), @ORM\Index(name="idx_gameAuthorWork_game_id", columns={"game_id"})})
 */ 
class GameAuthorWork
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="gameAuthorWork")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
    */
    protected $game;
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="gameAuthorWork")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id", nullable=false)
    */
    protected $author;
    
    /**
     * @ORM\Id 
     * @ORM\ManyToOne(targetEntity="Work", inversedBy="gameAuthorWork")
     * @ORM\JoinColumn(name="work_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
    */
    protected $work;

    /**
     * Set game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return GameAuthorWork
     */
    public function setGame(\AppBundle\Entity\Game $game)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \AppBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set author
     *
     * @param \AppBundle\Entity\Author $author
     *
     * @return GameAuthorWork
     */
    public function setAuthor(\AppBundle\Entity\Author $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \AppBundle\Entity\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set work
     *
     * @param \AppBundle\Entity\Work $work
     *
     * @return GameAuthorWork
     */
    public function setWork(\AppBundle\Entity\Work $work)
    {
        $this->work = $work;

        return $this;
    }

    /**
     * Get work
     *
     * @return \AppBundle\Entity\Work
     */
    public function getWork()
    {
        return $this->work;
    }
}
