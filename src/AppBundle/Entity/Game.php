<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="game")
 **/

class Game
{
    /** 
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
    **/
    protected $id;

    /**
     *  @ORM\Column(type="string", unique=true, length=100)
     **/
    protected $gameTitle;

    /**
     *  @ORM\Column(type="text")
     **/
    protected $description;
    
    /**
     *  @ORM\Column(type="text")
     **/
    protected $note;    
    
    /**
     *  @ORM\Column(type="date")
     **/
    protected $createDate;
    
    /**
     *  @ORM\Column(type="date")
     **/
    protected $addDate;
    
    /**
     *  @ORM\Column(type="date")
     **/
    protected $modDate;
    
    /**
     * One Game have Many Images.
     * @ORM\OneToMany(targetEntity="Images", mappedBy="game")
     **/
    private $images;
    
     public function __construct() {
        $this->images = new ArrayCollection();
    }
    

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
     * Set gameTitle
     *
     * @param string $gameTitle
     *
     * @return Game
     */
    public function setGameTitle($gameTitle)
    {
        $this->gameTitle = $gameTitle;

        return $this;
    }

    /**
     * Get gameTitle
     *
     * @return string
     */
    public function getGameTitle()
    {
        return $this->gameTitle;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Game
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
     * Set note
     *
     * @param string $note
     *
     * @return Game
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set createDate
     *
     * @param \DateTime $createDate
     *
     * @return Game
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
     * @return Game
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
     * @return Game
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
     * Add image
     *
     * @param \AppBundle\Entity\Images $image
     *
     * @return Game
     */
    public function addImage(\AppBundle\Entity\Images $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \AppBundle\Entity\Images $image
     */
    public function removeImage(\AppBundle\Entity\Images $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }
}
