<?php

namespace GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Model\GameUserRateInterface as UserGameUserRateInterface;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="gameUserRate",
 *      indexes={
 *          @ORM\Index(name="idx_gameUserRate_rate_id", columns={"rate_id"}),
 *          @ORM\Index(name="idx_gameUserRate_user_id", columns={"user_id"}),
 *          @ORM\Index(name="idx_gameUserRate_game_id", columns={"game_id"})
 *      },
 * )
 */
class GameUserRate implements UserGameUserRateInterface
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(
     *      targetEntity="Game",
     *      inversedBy="gameUserRate"
     * )
     * @ORM\JoinColumn(
     *      name="game_id",
     *      referencedColumnName="id",
     *      onDelete="CASCADE"
     * )
    */
    protected $game;
    
    /**
     * @ORM\ManyToOne(
     *      targetEntity="Rate",
     *      inversedBy="gameUserRate"
     * )
     * @ORM\JoinColumn(
     *      name="rate_id",
     *      referencedColumnName="id",
     *      nullable=false
     * )
    */
    protected $rate;
    
    /**
     * @ORM\Id
     * @ORM\ManyToOne(
     *      targetEntity="GameBundle\Model\UserInterface",
     *      inversedBy="gameUserRate"
     * )
     * @ORM\JoinColumn(
     *      name="user_id",
     *      referencedColumnName="id",
     *      onDelete="CASCADE",
     *      nullable=false
     * )
    */
    protected $user;

    /**
     * Set game
     *
     * @param \GameBundle\Entity\Game $game
     *
     * @return GameUserRate
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
     * Set rate
     *
     * @param \GameBundle\Entity\Rate $rate
     *
     * @return GameUserRate
     */
    public function setRate(\GameBundle\Entity\Rate $rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return \GameBundle\Entity\Rate
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     *
     * @return GameUserRate
     */
    public function setUser(\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
