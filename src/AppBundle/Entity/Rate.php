<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="rate", uniqueConstraints={@ORM\UniqueConstraint(name="value_UNIQUE", columns={"`value`"}), @ORM\UniqueConstraint(name="label_UNIQUE", columns={"label"})})
 */
class Rate
{
    
    /** 
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     *  @ORM\Column(name="`value`", type="smallint")
     */
    protected $value;
    
    /**     
     * @ORM\Column(type="string", length=100)
     */
    protected $label;
    
    /**     
     * @ORM\OneToMany(targetEntity="GameUserRate", mappedBy="rate")
     */
    protected $gameUserRate;
    
    public function __construct()
    {
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
     * Set value
     *
     * @param integer $value
     *
     * @return Rate
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set label
     *
     * @param string $label
     *
     * @return Rate
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Add gameUserRate
     *
     * @param \AppBundle\Entity\GameUserRate $gameUserRate
     *
     * @return Rate
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
}
