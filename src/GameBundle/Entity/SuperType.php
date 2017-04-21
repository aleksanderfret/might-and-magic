<?php

namespace GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="`supertype`",
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(
 *              name="supertype_UNIQUE",
 *              columns={"`supertype`"}
 *          )
 *      }
 * )
 */
class SuperType
{
    /**
     * @var id
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var supertype
     * @ORM\Column(name="`supertype`", type="string", length=100)
     */
    protected $supertype;
    
    /**
     * @ORM\OneToMany(targetEntity="Type", mappedBy="supertype")
     */
    protected $type;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->type = new ArrayCollection();
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
     * Set supertype
     *
     * @param string $supertype
     *
     * @return SuperType
     */
    public function setSupertype($supertype)
    {
        $this->supertype = $supertype;

        return $this;
    }

    /**
     * Get supertype
     *
     * @return string
     */
    public function getSupertype()
    {
        return $this->supertype;
    }

    /**
     * Add type
     *
     * @param \GameBundle\Entity\Type $type
     *
     * @return SuperType
     */
    public function addType(\GameBundle\Entity\Type $type)
    {
        $this->type[] = $type;

        return $this;
    }

    /**
     * Remove type
     *
     * @param \GameBundle\Entity\Type $type
     */
    public function removeType(\GameBundle\Entity\Type $type)
    {
        $this->type->removeElement($type);
    }

    /**
     * Get type
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getType()
    {
        return $this->type;
    }
}
