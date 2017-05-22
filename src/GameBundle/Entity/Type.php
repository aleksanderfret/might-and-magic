<?php

namespace GameBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="`type`",
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(
 *              name="type_UNIQUE",
 *              columns={"`type`"}
 *          )
 *      }
 * )
 */
class Type
{
    /**
     * @var id
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
     * @ORM\OneToMany(targetEntity="Contents", mappedBy="type")
     */
    protected $contents;
    
    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="type")
     */
    protected $image;
    
    /**
     * @ORM\ManyToOne(targetEntity="SuperType", inversedBy="type")
     * @ORM\JoinColumn(name="supertype_id", referencedColumnName="id", nullable=true)
     */
    protected $supertype;


    public function __construct()
    {
        $this->contents = new ArrayCollection();
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
     * Add content
     *
     * @param \GameBundle\Entity\Contents $content
     *
     * @return Type
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
     * Add image
     *
     * @param \GameBundle\Entity\Image $image
     *
     * @return Type
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
     * Set supertype
     *
     * @param \GameBundle\Entity\SuperType $supertype
     *
     * @return Type
     */
    public function setSupertype(\GameBundle\Entity\SuperType $supertype = null)
    {
        $this->supertype = $supertype;

        return $this;
    }

    /**
     * Get supertype
     *
     * @return \GameBundle\Entity\SuperType
     */
    public function getSupertype()
    {
        return $this->supertype;
    }
}
