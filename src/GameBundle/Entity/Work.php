<?php

namespace GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(
 *     name="`work`",
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(
 *             name="work_UNIQUE",
 *             columns={"`work`"}
 *         )
 *     }
 * )
 */
class Work
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *  @ORM\Column(name="`work`", type="string", length=255)
     */
    protected $work;
    
    /**
     * @ORM\OneToMany(targetEntity="GameAuthorWork", mappedBy="work")
     */
    protected $gameAuthorWork;
    
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
     * Set work
     *
     * @param string $work
     *
     * @return Work
     */
    public function setWork($work)
    {
        $this->work = $work;

        return $this;
    }

    /**
     * Get work
     *
     * @return string
     */
    public function getWork()
    {
        return $this->work;
    }

    /**
     * Add gameAuthorWork
     *
     * @param \GameBundle\Entity\GameAuthorWork $gameAuthorWork
     *
     * @return Work
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
}
