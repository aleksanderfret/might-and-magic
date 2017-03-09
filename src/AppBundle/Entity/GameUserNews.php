<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="gameUserNews", indexes={@ORM\Index(name="idx_gameUserNews_news_id", columns={"news_id"}), @ORM\Index(name="idx_gameUserNews_user_id", columns={"user_id"}), @ORM\Index(name="idx_gameUserNews_game_id", columns={"game_id"})})
 */ 
class GameUserNews
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="gameUserNews")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id", onDelete="CASCADE")
    */
    protected $game;
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="News", inversedBy="gameUserNews")
     * @ORM\JoinColumn(name="news_id", referencedColumnName="id", nullable=false)
    */
    protected $news;
    
    /**
     * @ORM\Id 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="gameUserNews")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
    */
    protected $user;

    /**
     * Set game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return GameUserNews
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
     * Set news
     *
     * @param \AppBundle\Entity\News $news
     *
     * @return GameUserNews
     */
    public function setNews(\AppBundle\Entity\News $news)
    {
        $this->news = $news;

        return $this;
    }

    /**
     * Get news
     *
     * @return \AppBundle\Entity\News
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return GameUserNews
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
