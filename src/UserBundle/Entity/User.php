<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseFosUser;
use GameBundle\Model\UserInterface as GameUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="`user`",uniqueConstraints={
 *      @ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"}),
 *      @ORM\UniqueConstraint(name="username_UNIQUE", columns={"username"})
 * })
 */
class User extends BaseFosUser implements GameUserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
     
    /**
     * @ORM\Column(name="`name`", type="string", length=50, nullable=true)
     * @Assert\Length(
     *     min = 3,
     *     max = 50,
     *     minMessage= "Imię musi posiadać przynajmniej {{ limit }} znaki",
     *     maxMessage= "Imię nie może mieć więcej niż {{ limit }} znaków."
     * )
     * @Assert\Regex(
     *     pattern     = "/^[a-zA-ZęóąśłżźćńĘĄŚŁŻŹĆŃ -]+$/",
     *     htmlPattern = "^[a-zA-ZęóąśłżźćńĘĄŚŁŻŹĆŃ -]+$"
     * )
     */
    protected $name;
    
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $surname;
    
    /**
     *  @ORM\Column(type="datetime")
     */
    protected $regDate;
    
    /**
     *  @ORM\ManyToOne(targetEntity="Avatar", inversedBy="user")
     *  @ORM\JoinColumn(name="avatar_id", referencedColumnName="id", nullable=false)
     */
    protected $avatar;
    
    /**
     *  @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $sid;
    
    /**
     *  @ORM\Column(name="`timestamp`", type="datetime", nullable=true)
     */
    protected $timestamp;
    
    /**
     *  @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $validationCode;
    
    /**
     * @ORM\OneToMany(targetEntity="UserBundle\Model\CommentInterface", mappedBy="author")
     */
    protected $comment;
    
    /**
     * @ORM\OneToOne(targetEntity="UserBundle\Model\AuthorInterface", mappedBy="user")
     */
    protected $author;
    
    /**
     * @ORM\OneToMany(targetEntity="UserBundle\Model\GameUserNewsInterface", mappedBy="user")
     */
    protected $gameUserNews;
    
    /**
     * @ORM\OneToMany(targetEntity="UserBundle\Model\GameUserRateInterface", mappedBy="user")
     */
    protected $gameUserRate;
    
    public function __construct()
    {
        parent::__construct();
        $this->gameUserNews = new ArrayCollection();
        $this->gameUserRate = new ArrayCollection();
        $this->comment = new ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set regDate
     *
     * @param \DateTime $regDate
     *
     * @return User
     */
    public function setRegDate($regDate)
    {
        $this->regDate = $regDate;

        return $this;
    }

    /**
     * Get regDate
     *
     * @return \DateTime
     */
    public function getRegDate()
    {
        return $this->regDate;
    }

    /**
     * Set sid
     *
     * @param string $sid
     *
     * @return User
     */
    public function setSid($sid)
    {
        $this->sid = $sid;

        return $this;
    }

    /**
     * Get sid
     *
     * @return string
     */
    public function getSid()
    {
        return $this->sid;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     *
     * @return User
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set validationCode
     *
     * @param string $validationCode
     *
     * @return User
     */
    public function setValidationCode($validationCode)
    {
        $this->validationCode = $validationCode;

        return $this;
    }

    /**
     * Get validationCode
     *
     * @return string
     */
    public function getValidationCode()
    {
        return $this->validationCode;
    }

    /**
     * Set avatar
     *
     * @param \UserBundle\Entity\Avatar $avatar
     *
     * @return User
     */
    public function setAvatar(\UserBundle\Entity\Avatar $avatar = null)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return \UserBundle\Entity\Avatar
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Add comment
     *
     * @param \GameBundle\Entity\Comment $comment
     *
     * @return User
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
     * Set author
     *
     * @param \GameBundle\Entity\Author $author
     *
     * @return User
     */
    public function setAuthor(\GameBundle\Entity\Author $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \GameBundle\Entity\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Add gameUserNews
     *
     * @param \GameBundle\Entity\GameUserNews $gameUserNews
     *
     * @return User
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
     * @return User
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
}
