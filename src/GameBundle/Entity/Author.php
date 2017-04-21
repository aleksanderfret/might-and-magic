<?php

namespace GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use UserBundle\Model\AuthorInterface as UserAuthorInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="author",
 *      indexes={
 *          @ORM\Index(name="idx_author_user_id", columns={"user_id"})
 *      },
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(name="user_id_UNIQUE", columns={"user_id"})
 *      }
 * )
 */
class Author implements UserAuthorInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     *  @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $nick;
    
    /**
     *  @ORM\Column(name="`name`", type="string", length=50, nullable=true)
     */
    protected $name;
    
    /**
     *  @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $surname;

    /**
     * @ORM\OneToMany(targetEntity="GameAuthorWork", mappedBy="author")
     */
    protected $gameAuthorWork;
    
    /**
     * @ORM\OneToOne(targetEntity="GameBundle\Model\UserInterface", inversedBy="author")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    protected $user;
    
    public function __construct()
    {
        $this->gameAuthorWork = new ArrayCollection();
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
     * @return Author
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
     * Set name
     *
     * @param string $name
     *
     * @return Author
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
     * @return Author
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
     * Add gameAuthorWork
     *
     * @param \GameBundle\Entity\GameAuthorWork $gameAuthorWork
     *
     * @return Author
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
     * Set user
     *
     * @param \GameBundle\Entity\User $user
     *
     * @return Author
     */
    public function setUser(\GameBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \GameBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
