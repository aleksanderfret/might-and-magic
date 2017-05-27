<?php

namespace GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="`contents`",
 *      indexes={
 *          @ORM\Index(name="idx_element_type_id", columns={"type_id"}),
 *          @ORM\Index(name="idx_element_game_id", columns={"game_id"})
 *      }
 * )
 */
class Contents
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *  @ORM\Column(type="integer")
     */
    protected $amount;
    
    /**
     *  @ORM\Column(type="datetime")
     */
    protected $createDate;
    
    /**
     *  @ORM\Column(type="datetime")
     */
    protected $addDate;
    
    /**
     *  @ORM\Column(type="datetime")
     */
    protected $modDate;
    
    /**
     * @ORM\ManyToOne(targetEntity="Type", inversedBy="contents")
     * @ORM\JoinColumn(
     *      name="type_id",
     *      referencedColumnName="id",
     *      nullable=false)
     */
    protected $type;
    
    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="contents")
     * @ORM\JoinColumn(
     *      name="game_id",
     *      referencedColumnName="id",
     *      nullable=false)
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
     * Set amount
     *
     * @param integer $amount
     *
     * @return Contents
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return integer
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     *
     * @return Contents
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set addDate
     *
     * @param \DateTime $addDate
     *
     * @return Contents
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;

        return $this;
    }

    /**
     * Get addDate
     *
     * @return \DateTime
     */
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * Set modDate
     *
     * @param \DateTime $modDate
     *
     * @return Contents
     */
    public function setModDate($modDate)
    {
        $this->modDate = $modDate;

        return $this;
    }

    /**
     * Get modDate
     *
     * @return \DateTime
     */
    public function getModDate()
    {
        return $this->modDate;
    }

    /**
     * Set type
     *
     * @param \GameBundle\Entity\Type $type
     *
     * @return Contents
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
     * @return Contents
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
