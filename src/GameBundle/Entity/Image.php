<?php

namespace GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="image",
 *      indexes={
 *          @ORM\Index(
 *              name="idx_image_type_id",
 *              columns={"type_id"}
 *          ),
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
class Image
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
     *  @ORM\Column(
     *      type="text",
     *      nullable=true
     * )
     */
    protected $description;
    
    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="image")
     * @ORM\JoinColumn(
     *      name="game_id",
     *      referencedColumnName="id",
     *      nullable=false
     * )
     */
    protected $game;
    
    /**
     * @ORM\ManyToOne(
     *      targetEntity="Type",
     *      inversedBy="image"
     * )
     * @ORM\JoinColumn(
     *      name="type_id",
     *      referencedColumnName="id",
     *      nullable=false
     * )
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
     * @return Image
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
     * Set type
     *
     * @param \GameBundle\Entity\Type $type
     *
     * @return Image
     */
    public function setType(\GameBundle\Entity\Type $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \GameBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set game
     *
     * @param \GameBundle\Entity\Game $game
     *
     * @return Image
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
}
