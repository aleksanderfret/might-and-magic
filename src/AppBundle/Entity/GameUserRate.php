<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="gameUserRate", indexes={@ORM\Index(name="idx_gameUserRate_rate_id", columns={"rate_id"}), @ORM\Index(name="idx_gameUserRate_user_id", columns={"user_id"}), @ORM\Index(name="idx_gameUserRate_game_id", columns={"game_id"})})
 */
class GameUserRate
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="gameUserRate")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id", onDelete="CASCADE")
    */
    protected $game;
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Rate", inversedBy="gameUserRate")
     * @ORM\JoinColumn(name="rate_id", referencedColumnName="id", nullable=false)
    */
    protected $rate;
    
    /**
     * @ORM\Id 
     * @ORM\ManyToOne(targetEntity="User", inversedBy="gameUserRate")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
    */
    protected $user;

    /**
     * Set game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return GameUserRate
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
     * Set rate
     *
     * @param \AppBundle\Entity\Rate $rate
     *
     * @return GameUserRate
     */
    public function setRate(\AppBundle\Entity\Rate $rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return \AppBundle\Entity\Rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return GameUserRate
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
