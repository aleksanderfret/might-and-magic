<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="image")
 *  **/


class Image
{
    /** 
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
    **/
    protected $id;

    /**
     *  @ORM\Column(type="string", unique=true, length=255)
     **/
    protected $imgFileName;
    
    /**
     *  @ORM\Column(type="text")
     **/
    protected $description;

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
     * Set imgFileName
     *
     * @param string $imgFileName
     *
     * @return Image
     */
    public function setImgFileName($imgFileName)
    {
        $this->imgFileName = $imgFileName;

        return $this;
    }

    /**
     * Get imgFileName
     *
     * @return string
     */
    public function getImgFileName()
    {
        return $this->imgFileName;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Image
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
}
