<?php

namespace RemovalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Bossdown
 *
 * @ORM\Table(name="bossdown")
 * @ORM\Entity(repositoryClass="RemovalBundle\Repository\BossdownRepository")
 */
class Bossdown
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="RemovalBundle\Entity\Raid")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $raid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="nm", type="boolean")
     */
    private $nm;

    /**
     * @var bool
     *
     * @ORM\Column(name="hm", type="boolean")
     */
    private $hm;

    /**
     * @var bool
     *
     * @ORM\Column(name="mm", type="boolean")
     */
    private $mm;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="string", length=255)
     * @Assert\File(
     *    mimeTypes={
     *        "image/png",
     *        "image/jpeg",
     *        "image/jpg",
     *        "image/bmp"
     *    }
     * )
     */
    private $imageUrl;

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
     * Set name
     *
     * @param string $name
     *
     * @return Bossdown
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
     * Set nm
     *
     * @param boolean $nm
     *
     * @return Bossdown
     */
    public function setNm($nm)
    {
        $this->nm = $nm;

        return $this;
    }

    /**
     * Get nm
     *
     * @return boolean
     */
    public function getNm()
    {
        return $this->nm;
    }

    /**
     * Set hm
     *
     * @param boolean $hm
     *
     * @return Bossdown
     */
    public function setHm($hm)
    {
        $this->hm = $hm;

        return $this;
    }

    /**
     * Get hm
     *
     * @return boolean
     */
    public function getHm()
    {
        return $this->hm;
    }

    /**
     * Set mm
     *
     * @param boolean $mm
     *
     * @return Bossdown
     */
    public function setMm($mm)
    {
        $this->mm = $mm;

        return $this;
    }

    /**
     * Get mm
     *
     * @return boolean
     */
    public function getMm()
    {
        return $this->mm;
    }

    /**
     * Set raid
     *
     * @param \RemovalBundle\Entity\Raid $raid
     *
     * @return Bossdown
     */
    public function setRaid(\RemovalBundle\Entity\Raid $raid)
    {
        $this->raid = $raid;

        return $this;
    }

    /**
     * Get raid
     *
     * @return \RemovalBundle\Entity\Raid
     */
    public function getRaid()
    {
        return $this->raid;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return Bossdown
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }
}
