<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="`user`", uniqueConstraints={@ORM\UniqueConstraint(name="email_UNIQUE", columns={"email"}), @ORM\UniqueConstraint(name="nick_UNIQUE", columns={"nick"})})
 */
class User
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *  @ORM\Column(type="string", length=255)
     */
    protected $nick;
    
    /**
     *  @ORM\Column(name="`password`", type="string", length=255)
     */
    protected $password;    
    
    /**
     *  @ORM\Column(type="string", length=255)
     */
    protected $email;
    
    /**
     *  @ORM\Column(name="`name`", type="string", length=50, nullable=true)
     */
    protected $name;
    
    /**
     *  @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $surname;    
    
    /**
     *  @ORM\Column(type="datetime")
     */
    protected $regDate;
    
    /**
     *  @ORM\Column(type="datetime")
     */
    protected $lastLog;
    
    /**
     *  @ORM\Column(type="smallint", options={"default":0})
     */
    protected $active;
    
    /**
     *  @ORM\Column(type="string", length=255, nullable=true)
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
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */
    protected $comment;
    
    /**
     * @ORM\OneToOne(targetEntity="Author", mappedBy="user")
     */
    protected $author;
    
    /**     
     * @ORM\OneToMany(targetEntity="GameUserNews", mappedBy="user")
     */
    protected $gameUserNews;
    
    /**     
     * @ORM\OneToMany(targetEntity="GameUserRate", mappedBy="user")
     */
    protected $gameUserRate;
    
    /**
     * @ORM\ManyToMany(targetEntity="Role", inversedBy="user")
     * @ORM\JoinTable(name="userrole")
     */
    protected $role;
    
    public function __construct()
    {
        $this->gameUserNews = new ArrayCollection();
        $this->gameUserRate = new ArrayCollection();
        $this->role = new ArrayCollection();
        $this->comment = new ArrayCollection();
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
     * Set nick
     *
     * @param string $nick
     *
     * @return User
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Get nick
     *
     * @return string
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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
     * Set lastLog
     *
     * @param \DateTime $lastLog
     *
     * @return User
     */
    public function setLastLog($lastLog)
    {
        $this->lastLog = $lastLog;

        return $this;
    }

    /**
     * Get lastLog
     *
     * @return \DateTime
     */
    public function getLastLog()
    {
        return $this->lastLog;
    }

    /**
     * Set active
     *
     * @param integer $active
     *
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
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
     * Add comment
     *
     * @param \AppBundle\Entity\Comment $comment
     *
     * @return User
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
     * Set author
     *
     * @param \AppBundle\Entity\Author $author
     *
     * @return User
     */
    public function setAuthor(\AppBundle\Entity\Author $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \AppBundle\Entity\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Add gameUserNews
     *
     * @param \AppBundle\Entity\GameUserNews $gameUserNews
     *
     * @return User
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
     * @return User
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
     * Add role
     *
     * @param \AppBundle\Entity\Role $role
     *
     * @return User
     */
    public function addRole(\AppBundle\Entity\Role $role)
    {
        $this->role[] = $role;

        return $this;
    }

    /**
     * Remove role
     *
     * @param \AppBundle\Entity\Role $role
     */
    public function removeRole(\AppBundle\Entity\Role $role)
    {
        $this->role->removeElement($role);
    }

    /**
     * Get role
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRole()
    {
        return $this->role;
    }
}
