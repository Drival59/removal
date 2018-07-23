<?php

namespace RemovalBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @var
     * @ORM\OneToMany(targetEntity="RemovalBundle\Entity\Mythique", mappedBy="user")
     */
    private $groupe;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="RemovalBundle\Entity\Participants", mappedBy="user")
     */
    private $participants;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255, nullable=true)
     * @Assert\File(
     *    mimeTypes={
     *        "image/png",
     *        "image/jpeg",
     *        "image/jpg",
     *        "image/bmp"
     *    }
     * )
     */
    private $avatar;

    /**
     * @return mixed
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * @param mixed $participants
     */
    public function setParticipants($participants)
    {
        $this->participants[] = $participants;
    }



    /**
     * @return mixed
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * @param Mythique $groupe
     */
    public function setGroupe(Mythique $groupe)
    {
        $this->groupe[] = $groupe;
    }



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
        $this->groupe = new ArrayCollection();
        $this->participants = new ArrayCollection();
        $this->avatar = "default_user_removal.png";
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



    /**
     * Add groupe
     *
     * @param \RemovalBundle\Entity\Mythique $groupe
     *
     * @return User
     */
    public function addGroupe(\RemovalBundle\Entity\Mythique $groupe)
    {
        $this->groupe[] = $groupe;

        return $this;
    }

    /**
     * Remove groupe
     *
     * @param \RemovalBundle\Entity\Mythique $groupe
     */
    public function removeGroupe(\RemovalBundle\Entity\Mythique $groupe)
    {
        $this->groupe->removeElement($groupe);
    }

    /**
     * Add participant
     *
     * @param \RemovalBundle\Entity\Participants $participant
     *
     * @return User
     */
    public function addParticipant(\RemovalBundle\Entity\Participants $participant)
    {
        $this->participants[] = $participant;

        return $this;
    }

    /**
     * Remove participant
     *
     * @param \RemovalBundle\Entity\Participants $participant
     */
    public function removeParticipant(\RemovalBundle\Entity\Participants $participant)
    {
        $this->participants->removeElement($participant);
    }


    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
}
