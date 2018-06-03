<?php

namespace RemovalBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur")
 * @ORM\Entity(repositoryClass="RemovalBundle\Repository\JoueurRepository")
 */
class Joueur
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
     * @var
     * @ORM\ManyToOne(targetEntity="RemovalBundle\Entity\User", inversedBy="joueurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

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
     * @return Joueur
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
     * @return Joueur
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
     * @return Joueur
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
}

