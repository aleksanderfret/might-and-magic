<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity 
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GameRepository")
 * @ORM\Table(name="game", indexes={@ORM\Index(name="idx_game_editionId", columns={"edition_id"})})
 */
class Game
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer") 
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *  @ORM\Column(type="string", length=100)
     */
    protected $title;
    
    /**
     *  @ORM\Column(type="smallint", options={"default":1})
     */
    protected $expansion;

    /**
     *  @ORM\Column(type="text", nullable=true)
     */
    protected $description;
    
    /**
     *  @ORM\Column(type="text", nullable=true)
     */
    protected $note;    
    
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
     *  @ORM\Column(type="string", length=255)
     */
    protected $download;
    
    /**
     *  @ORM\ManyToMany(targetEntity="Image", mappedBy="game")
     */
    protected $image;
    
    /**     
     * @ORM\OneToMany(targetEntity="Element", mappedBy="game")
     */
    protected $element;
    
    /**     
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="game")
     */
    protected $comment;
    
    /**     
     * @ORM\OneToMany(targetEntity="GameAuthorWork", mappedBy="game")
     */
    protected $gameAuthorWork;
    
    /**     
     * @ORM\OneToMany(targetEntity="GameUserNews", mappedBy="game")
     */
    protected $gameUserNews;
    
    /**     
     * @ORM\OneToMany(targetEntity="GameUserRate", mappedBy="game")
     */
    protected $gameUserRate;
    
    /**
     * @ORM\ManyToOne(targetEntity="Edition", inversedBy="game")
     * @ORM\JoinColumn(name="edition_id", referencedColumnName="id", nullable=false)
     */
    protected $edition;
    
    public function __construct()
    {
        $this->image = new ArrayCollection();
        $this->element = new ArrayCollection();
        $this->comment = new ArrayCollection();
        $this->gameAuthorWork = new ArrayCollection();
        $this->gameUserNews = new ArrayCollection();
        $this->gameUserRate = new ArrayCollection();
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
     * Set download
     *
     * @param string $download
     *
     * @return Game
     */
    public function setDownload($download)
    {
        $this->download = $download;

        return $this;
    }

    /**
     * Get download
     *
     * @return string
     */
    public function getDownload()
    {
        return $this->download;
    }

    /**
     * Add image
     *
     * @param \AppBundle\Entity\Image $image
     *
     * @return Game
     */
    public function addImage(\AppBundle\Entity\Image $image)
    {
        $this->image[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \AppBundle\Entity\Image $image
     */
    public function removeImage(\AppBundle\Entity\Image $image)
    {
        $this->image->removeElement($image);
    }

    /**
     * Get image
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add element
     *
     * @param \AppBundle\Entity\Element $element
     *
     * @return Game
     */
    public function addElement(\AppBundle\Entity\Element $element)
    {
        $this->element[] = $element;

        return $this;
    }

    /**
     * Remove element
     *
     * @param \AppBundle\Entity\Element $element
     */
    public function removeElement(\AppBundle\Entity\Element $element)
    {
        $this->element->removeElement($element);
    }

    /**
     * Get element
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * Add comment
     *
     * @param \AppBundle\Entity\Comment $comment
     *
     * @return Game
     */
    public function addComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comment[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \AppBundle\Entity\Comment $comment
     */
    public function removeComment(\AppBundle\Entity\Comment $comment)
    {
        $this->comment->removeElement($comment);
    }

    /**
     * Get comment
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Add gameAuthorWork
     *
     * @param \AppBundle\Entity\GameAuthorWork $gameAuthorWork
     *
     * @return Game
     */
    public function addGameAuthorWork(\AppBundle\Entity\GameAuthorWork $gameAuthorWork)
    {
        $this->gameAuthorWork[] = $gameAuthorWork;

        return $this;
    }

    /**
     * Remove gameAuthorWork
     *
     * @param \AppBundle\Entity\GameAuthorWork $gameAuthorWork
     */
    public function removeGameAuthorWork(\AppBundle\Entity\GameAuthorWork $gameAuthorWork)
    {
        $this->gameAuthorWork->removeElement($gameAuthorWork);
    }

    /**
     * Get gameAuthorWork
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGameAuthorWork()
    {
        return $this->gameAuthorWork;
    }

    /**
     * Add gameUserNews
     *
     * @param \AppBundle\Entity\GameUserNews $gameUserNews
     *
     * @return Game
     */
    public function addGameUserNews(\AppBundle\Entity\GameUserNews $gameUserNews)
    {
        $this->gameUserNews[] = $gameUserNews;

        return $this;
    }

    /**
     * Remove gameUserNews
     *
     * @param \AppBundle\Entity\GameUserNews $gameUserNews
     */
    public function removeGameUserNews(\AppBundle\Entity\GameUserNews $gameUserNews)
    {
        $this->gameUserNews->removeElement($gameUserNews);
    }

    /**
     * Get gameUserNews
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGameUserNews()
    {
        return $this->gameUserNews;
    }

    /**
     * Add gameUserRate
     *
     * @param \AppBundle\Entity\GameUserRate $gameUserRate
     *
     * @return Game
     */
    public function addGameUserRate(\AppBundle\Entity\GameUserRate $gameUserRate)
    {
        $this->gameUserRate[] = $gameUserRate;

        return $this;
    }

    /**
     * Remove gameUserRate
     *
     * @param \AppBundle\Entity\GameUserRate $gameUserRate
     */
    public function removeGameUserRate(\AppBundle\Entity\GameUserRate $gameUserRate)
    {
        $this->gameUserRate->removeElement($gameUserRate);
    }

    /**
     * Get gameUserRate
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGameUserRate()
    {
        return $this->gameUserRate;
    }

    /**
     * Set edition
     *
     * @param \AppBundle\Entity\Edition $edition
     *
     * @return Game
     */
    public function setEdition(\AppBundle\Entity\Edition $edition)
    {
        $this->edition = $edition;

        return $this;
    }

    /**
     * Get edition
     *
     * @return \AppBundle\Entity\Edition
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Game
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
