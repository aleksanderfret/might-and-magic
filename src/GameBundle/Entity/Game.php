<?php

namespace GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="GameBundle\Repository\GameRepository")
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
     * @ORM\OneToMany(targetEntity="Download", mappedBy="game")
     */
    protected $download;
    
    /**
     *  @ORM\Column(name="slug",
     *      type="string",
     *      length=128,
     *      unique=true,
     *      nullable=false
     *  )
     */
    protected $slug;
    
    /**
     *  @ORM\Column(
     *      name="`cover`",
     *      type="string",
     *      unique=true,
     *      nullable=false,
     *      length=255
     * )
     */
    protected $cover;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="game")
     */
    protected $image;    
    
    /**
     * @ORM\OneToMany(targetEntity="Contents", mappedBy="game")
     */
    protected $contents;
    
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
     *  @ORM\Column(name="`avg`", type="decimal", nullable=true, precision=3, scale=1)
     */
    protected $avg;
    
    /**
     *  @ORM\Column(name="`votes`", type="integer", nullable=true)
     */
    protected $votes;
    
    /**
     * @ORM\ManyToOne(targetEntity="Edition", inversedBy="game")
     * @ORM\JoinColumn(name="edition_id", referencedColumnName="id", nullable=false)
     */
    protected $edition;
    
    public function __construct()
    {
        $this->download = new ArrayCollection();
        $this->image = new ArrayCollection();
        $this->contents = new ArrayCollection();
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

    /**
     * Set expansion
     *
     * @param integer $expansion
     *
     * @return Game
     */
    public function setExpansion($expansion)
    {
        $this->expansion = $expansion;

        return $this;
    }

    /**
     * Get expansion
     *
     * @return integer
     */
    public function getExpansion()
    {
        return $this->expansion;
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
     * Set slug
     *
     * @param string $slug
     *
     * @return Game
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Add download
     *
     * @param \GameBundle\Entity\Download $download
     *
     * @return Game
     */
    public function addDownload(\GameBundle\Entity\Download $download)
    {
        $this->download[] = $download;

        return $this;
    }

    /**
     * Remove download
     *
     * @param \GameBundle\Entity\Download $download
     */
    public function removeDownload(\GameBundle\Entity\Download $download)
    {
        $this->download->removeElement($download);
    }

    /**
     * Get download
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDownload()
    {
        return $this->download;
    }

    /**
     * Add image
     *
     * @param \GameBundle\Entity\Image $image
     *
     * @return Game
     */
    public function addImage(\GameBundle\Entity\Image $image)
    {
        $this->image[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \GameBundle\Entity\Image $image
     */
    public function removeImage(\GameBundle\Entity\Image $image)
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
     * Add content
     *
     * @param \GameBundle\Entity\Contents $content
     *
     * @return Game
     */
    public function addContent(\GameBundle\Entity\Contents $content)
    {
        $this->contents[] = $content;

        return $this;
    }

    /**
     * Remove content
     *
     * @param \GameBundle\Entity\Contents $content
     */
    public function removeContent(\GameBundle\Entity\Contents $content)
    {
        $this->contents->removeElement($content);
    }

    /**
     * Get contents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * Add comment
     *
     * @param \GameBundle\Entity\Comment $comment
     *
     * @return Game
     */
    public function addComment(\GameBundle\Entity\Comment $comment)
    {
        $this->comment[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \GameBundle\Entity\Comment $comment
     */
    public function removeComment(\GameBundle\Entity\Comment $comment)
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
     * @param \GameBundle\Entity\GameAuthorWork $gameAuthorWork
     *
     * @return Game
     */
    public function addGameAuthorWork(\GameBundle\Entity\GameAuthorWork $gameAuthorWork)
    {
        $this->gameAuthorWork[] = $gameAuthorWork;

        return $this;
    }

    /**
     * Remove gameAuthorWork
     *
     * @param \GameBundle\Entity\GameAuthorWork $gameAuthorWork
     */
    public function removeGameAuthorWork(\GameBundle\Entity\GameAuthorWork $gameAuthorWork)
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
     * @param \GameBundle\Entity\GameUserNews $gameUserNews
     *
     * @return Game
     */
    public function addGameUserNews(\GameBundle\Entity\GameUserNews $gameUserNews)
    {
        $this->gameUserNews[] = $gameUserNews;

        return $this;
    }

    /**
     * Remove gameUserNews
     *
     * @param \GameBundle\Entity\GameUserNews $gameUserNews
     */
    public function removeGameUserNews(\GameBundle\Entity\GameUserNews $gameUserNews)
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
     * @param \GameBundle\Entity\GameUserRate $gameUserRate
     *
     * @return Game
     */
    public function addGameUserRate(\GameBundle\Entity\GameUserRate $gameUserRate)
    {
        $this->gameUserRate[] = $gameUserRate;

        return $this;
    }

    /**
     * Remove gameUserRate
     *
     * @param \GameBundle\Entity\GameUserRate $gameUserRate
     */
    public function removeGameUserRate(\GameBundle\Entity\GameUserRate $gameUserRate)
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
     * @param \GameBundle\Entity\Edition $edition
     *
     * @return Game
     */
    public function setEdition(\GameBundle\Entity\Edition $edition)
    {
        $this->edition = $edition;

        return $this;
    }

    /**
     * Get edition
     *
     * @return \GameBundle\Entity\Edition
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Set cover
     *
     * @param string $cover
     *
     * @return Game
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set avg
     *
     * @param float $avg
     *
     * @return Game
     */
    public function setAvg($avg)
    {
        $this->avg = $avg;

        return $this;
    }

    /**
     * Get avg
     *
     * @return float
     */
    public function getAvg()
    {
        return $this->avg;
    }

    /**
     * Set votes
     *
     * @param integer $votes
     *
     * @return Game
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;

        return $this;
    }

    /**
     * Get votes
     *
     * @return integer
     */
    public function getVotes()
    {
        return $this->votes;
    }
}
