<?php

namespace RemovalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * News
 *
 * @ORM\Table(name="news")
 * @ORM\Entity(repositoryClass="RemovalBundle\Repository\NewsRepository")
 */
class News
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_news", type="datetime")
     */
    private $dateNews;

    /**
     * @ORM\Column(name="in_carousel", type="boolean")
     */
    private $inCarousel;

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
     * @ORM\ManyToOne(targetEntity="RemovalBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private $utilisateur;


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
     * Set title
     *
     * @param string $title
     *
     * @return News
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return News
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set dateNews
     *
     * @param \DateTime $dateNews
     *
     * @return News
     */
    public function setDateNews($dateNews)
    {
        $this->dateNews = $dateNews;

        return $this;
    }

    /**
     * Get dateNews
     *
     * @return \DateTime
     */
    public function getDateNews()
    {
        return $this->dateNews;
    }

    /**
     * Set inCarousel
     *
     * @param boolean $inCarousel
     *
     * @return News
     */
    public function setInCarousel($inCarousel)
    {
        $this->inCarousel = $inCarousel;

        return $this;
    }

    /**
     * Get inCarousel
     *
     * @return boolean
     */
    public function getInCarousel()
    {
        return $this->inCarousel;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return News
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

    /**
     * Set utilisateur
     *
     * @param \RemovalBundle\Entity\User $utilisateur
     *
     * @return News
     */
    public function setUtilisateur(\RemovalBundle\Entity\User $utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \RemovalBundle\Entity\User
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
