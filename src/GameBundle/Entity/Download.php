<?php

namespace GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="download",
 *      indexes={
 *          @ORM\Index(
 *              name="idx_image_game_id",
 *              columns={"game_id"}
 *          )
 *      },
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(
 *              name="file_UNIQUE",
 *              columns={"`file`"}
 *          )
 *      }
 * )
 */
class Download
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *  @ORM\Column(
     *      name="`file`",
     *      type="string",
     *      unique=true,
     *      length=255
     * )
     */
    protected $file;
    
    /**
     *  @ORM\Column(type="integer", nullable=false)
     */
    protected $size;
    
    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="download")
     * @ORM\JoinColumn(
     *      name="game_id",
     *      referencedColumnName="id",
     *      nullable=false
     * )
     */
    protected $game;
    
    /**
     *  @ORM\Column(type="smallint", options={"default":1}, nullable=false)
     */
    protected $type;    

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
     * Set file
     *
     * @param string $file
     *
     * @return Download
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set size
     *
     * @param float $size
     *
     * @return Download
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return float
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set game
     *
     * @param \GameBundle\Entity\Game $game
     *
     * @return Download
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
     * Set type
     *
     * @param integer $type
     *
     * @return Download
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }
}
