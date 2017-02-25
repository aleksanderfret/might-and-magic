<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="image")
 *  **/


class Image
{
    /** 
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
    **/
    protected $id;

    /**
     *  @ORM\Column(type="string", unique=true, length=255)
     **/
    protected $imgFileName;
    
    /**
     *  @ORM\Column(type="text")
     **/
    protected $description;
    
    /**
     *  @ORM\Column(type="integer")
     **/
   protected $gameId;

   /**
     * Many Images have One Game.
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="image")
     * @ORM\JoinColumn(name="gameId", referencedColumnName="id")
     */
    protected $game;    

    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set imgFileName
     *
     * @param string $imgFileName
     *
     * @return Image
     */
    public function setImgFileName($imgFileName)
    {
        $this->imgFileName = $imgFileName;

        return $this;
    }

    /**
     * Get imgFileName
     *
     * @return string
     */
    public function getImgFileName()
    {
        return $this->imgFileName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Image
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set gameId
     *
     * @param integer $gameId
     *
     * @return Image
     */
    public function setGameId($gameId)
    {
        $this->gameId = $gameId;

        return $this;
    }

    /**
     * Get gameId
     *
     * @return integer
     */
    public function getGameId()
    {
        return $this->gameId;
    }

    /**
     * Set game
     *
     * @param \AppBundle\Entity\Game $game
     *
     * @return Image
     */
    public function setGame(\AppBundle\Entity\Game $game = null)
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
}
