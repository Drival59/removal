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
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="RemovalBundle\Entity\Participation", inversedBy="utilisateur")
     */
    private $participations;

    /**
     * @var
     * @ORM\OneToOne(targetEntity="RemovalBundle\Entity\Status", mappedBy="utilisateur")
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
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return ArrayCollection
     */
    public function getParticipations()
    {
        return $this->participations;
    }

    /**
     * @param Participation $participations
     */
    public function addParticipations(Participation $participations)
    {
        $this->participations[] = $participations;
    }

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->joueurs = new ArrayCollection();
        $this->participations = new ArrayCollection();
        $this->candidature = new ArrayCollection();
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
}

