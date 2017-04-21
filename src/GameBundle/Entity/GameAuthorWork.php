<?php

namespace GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="gameAuthorWork",
 *     indexes={
 *         @ORM\Index(
 *             name="idx_gameAuthorWork_author_id",
 *             columns={"author_id"}
 *         ),
 *         @ORM\Index(
 *             name="idx_gameAuthorWork_work_id",
 *             columns={"work_id"}
 *         ),
 *         @ORM\Index(
 *             name="idx_gameAuthorWork_game_id",
 *             columns={"game_id"}
 *         )
 *     }
 * )
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
     * @param \GameBundle\Entity\Game $game
     *
     * @return GameAuthorWork
     */
    public function setGame(\GameBundle\Entity\Game $game)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \GameBundle\Entity\Game
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * Set author
     *
     * @param \GameBundle\Entity\Author $author
     *
     * @return GameAuthorWork
     */
    public function setAuthor(\GameBundle\Entity\Author $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \GameBundle\Entity\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set work
     *
     * @param \GameBundle\Entity\Work $work
     *
     * @return GameAuthorWork
     */
    public function setWork(\GameBundle\Entity\Work $work)
    {
        $this->work = $work;

        return $this;
    }

    /**
     * Get work
     *
     * @return \GameBundle\Entity\Work
     */
    public function getWork()
    {
        return $this->work;
    }
}
