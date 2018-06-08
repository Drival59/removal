<?php

namespace RemovalBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="fosuser")
 * @ORM\Entity(repositoryClass="RemovalBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


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
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="RemovalBundle\Entity\Joueur", mappedBy="utilisateur")
     */
    private $joueurs;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="RemovalBundle\Entity\Status", mappedBy="utilisateur")
     */
    private $status;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="RemovalBundle\Entity\Candidature", mappedBy="utilisateur")
     */
    private $candidature;

    /**
     * @return mixed
     */
    public function getCandidature()
    {
        return $this->candidature;
    }

    /**
     * @param Candidature $candidature
     */
    public function addCandidature(Candidature $candidature)
    {
        $this->candidature[] = $candidature;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function addStatus(Status $status)
    {
        $this->status[] = $status;
    }

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->joueurs = new ArrayCollection();
        $this->candidature = new ArrayCollection();
        $this->status = new ArrayCollection();
    }

    /**
     * @param Joueur $joueurs
     */
    public function addJoueurs(Joueur $joueurs)
    {
        $this->joueurs[] = $joueurs;
    }

    /**
     * @return ArrayCollection
     */
    public function getJoueurs()
    {
        return $this->joueurs;
    }

    /**
     * Add joueur
     *
     * @param \RemovalBundle\Entity\Joueur $joueur
     *
     * @return User
     */
    public function addJoueur(\RemovalBundle\Entity\Joueur $joueur)
    {
        $this->joueurs[] = $joueur;

        return $this;
    }

    /**
     * Remove joueur
     *
     * @param \RemovalBundle\Entity\Joueur $joueur
     */
    public function removeJoueur(\RemovalBundle\Entity\Joueur $joueur)
    {
        $this->joueurs->removeElement($joueur);
    }

    /**
     * Add participation
     *
     * @param \RemovalBundle\Entity\Participation $participation
     *
     * @return User
     */
    public function addParticipation(\RemovalBundle\Entity\Participation $participation)
    {
        $this->participations[] = $participation;

        return $this;
    }

    /**
     * Remove participation
     *
     * @param \RemovalBundle\Entity\Participation $participation
     */
    public function removeParticipation(\RemovalBundle\Entity\Participation $participation)
    {
        $this->participations->removeElement($participation);
    }

    /**
     * Remove candidature
     *
     * @param \RemovalBundle\Entity\Candidature $candidature
     */
    public function removeCandidature(\RemovalBundle\Entity\Candidature $candidature)
    {
        $this->candidature->removeElement($candidature);
    }

    /**
     * Remove status
     *
     * @param \RemovalBundle\Entity\Status $status
     */
    public function removeStatus(\RemovalBundle\Entity\Status $status)
    {
        $this->status->removeElement($status);
    }
}
