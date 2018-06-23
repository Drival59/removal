<?php

namespace RemovalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Candidature
 *
 * @ORM\Table(name="candidature")
 * @ORM\Entity(repositoryClass="RemovalBundle\Repository\CandidatureRepository")
 */
class Candidature
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
     * @ORM\Column(name="pseudo", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $pseudo;

    /**
     * @var string
     *
     * @ORM\Column(name="classe", type="string", length=255)
     */
    private $classe;

    /**
     * @var string
     *
     * @ORM\Column(name="specialisation", type="string", length=255)
     */
    private $specialisation;

    /**
     * @var string
     *
     * @ORM\Column(name="battletag", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $battletag;

    /**
     * @var string
     *
     * @ORM\Column(name="armurerie", type="text")
     * @Assert\NotBlank()
     */
    private $armurerie;

    /**
     * @var string
     *
     * @ORM\Column(name="discord", type="string", length=255)
     */
    private $discord;

    /**
     * @var string
     *
     * @ORM\Column(name="joueur_reference", type="string", length=255, nullable=true)
     */
    private $joueurReference;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="disponibilite", type="datetime")
     */
    private $disponibilite;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="RemovalBundle\Entity\User", inversedBy="candidature")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=false)
     */
    private $status;

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * @param mixed $utilisateur
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pseudo
     *
     * @param string $pseudo
     *
     * @return Candidature
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set classe
     *
     * @param string $classe
     *
     * @return Candidature
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get classe
     *
     * @return string
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set specialisation
     *
     * @param string $specialisation
     *
     * @return Candidature
     */
    public function setSpecialisation($specialisation)
    {
        $this->specialisation = $specialisation;

        return $this;
    }

    /**
     * Get specialisation
     *
     * @return string
     */
    public function getSpecialisation()
    {
        return $this->specialisation;
    }

    /**
     * Set battletag
     *
     * @param string $battletag
     *
     * @return Candidature
     */
    public function setBattletag($battletag)
    {
        $this->battletag = $battletag;

        return $this;
    }

    /**
     * Get battletag
     *
     * @return string
     */
    public function getBattletag()
    {
        return $this->battletag;
    }

    /**
     * Set armurerie
     *
     * @param string $armurerie
     *
     * @return Candidature
     */
    public function setArmurerie($armurerie)
    {
        $this->armurerie = $armurerie;

        return $this;
    }

    /**
     * Get armurerie
     *
     * @return string
     */
    public function getArmurerie()
    {
        return $this->armurerie;
    }

    /**
     * Set discord
     *
     * @param string $discord
     *
     * @return Candidature
     */
    public function setDiscord($discord)
    {
        $this->discord = $discord;

        return $this;
    }

    /**
     * Get discord
     *
     * @return string
     */
    public function getDiscord()
    {
        return $this->discord;
    }

    /**
     * Set joueurReference
     *
     * @param string $joueurReference
     *
     * @return Candidature
     */
    public function setJoueurReference($joueurReference)
    {
        $this->joueurReference = $joueurReference;

        return $this;
    }

    /**
     * Get joueurReference
     *
     * @return string
     */
    public function getJoueurReference()
    {
        return $this->joueurReference;
    }

    /**
     * Set disponibilite
     *
     * @param \DateTime $disponibilite
     *
     * @return Candidature
     */
    public function setDisponibilite($disponibilite)
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    /**
     * Get disponibilite
     *
     * @return \DateTime
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Candidature
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
