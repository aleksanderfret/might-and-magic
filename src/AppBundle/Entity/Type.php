<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="`type`", uniqueConstraints={@ORM\UniqueConstraint(name="type_UNIQUE", columns={"`type`"})})
 */
class Type
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *  @ORM\Column(name="`type`", type="string", length=255)
     */
    protected $type;
    
    /**     
     * @ORM\OneToMany(targetEntity="Element", mappedBy="type")
     */
    protected $element;
    
    /**     
     * @ORM\OneToMany(targetEntity="Image", mappedBy="type")
     */
    protected $image;
    
    public function __construct() {
        $this->element = new ArrayCollection();
        $this->image = new ArrayCollection();
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
     * Set type
     *
     * @param string $type
     *
     * @return Type
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add element
     *
     * @param \AppBundle\Entity\Element $element
     *
     * @return Type
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
     * Add image
     *
     * @param \AppBundle\Entity\Image $image
     *
     * @return Type
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
}
