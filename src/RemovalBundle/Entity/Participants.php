<?php

namespace RemovalBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Participants
 *
 * @ORM\Table(name="participants")
 * @ORM\Entity(repositoryClass="RemovalBundle\Repository\ParticipantsRepository")
 */
class Participants
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
     * @var
     * @ORM\ManyToOne(targetEntity="RemovalBundle\Entity\User", inversedBy="participants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="RemovalBundle\Entity\Mythique", inversedBy="participants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $groupe;

    /**
     * @var string
     * @ORM\Column(name="nompersonnage", type="string", length=255, nullable=false, unique=false)
     */
    private $nompersonnage;

    /**
     * @var string
     * @ORM\Column(name="battletag", type="string", length=255, nullable=false, unique=false)
     */
    private $battletag;

    /**
     * @var string
     * @ORM\Column(name="classe", type="string", length=255, nullable=false, unique=false)
     */
    private $classe;

    /**
     * @var string
     * @ORM\Column(name="specialisation", type="string", length=255, nullable=false, unique=false)
     */
    private $specialisation;

    /**
     * @var string
     * @ORM\Column(name="message", type="text", nullable=true, unique=false)
     */
    private $message;

    /**
     * @var string
     * @ORM\Column(name="status", type="string", length=255, nullable=false, unique=false)
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
     * @return string
     */
    public function getNompersonnage()
    {
        return $this->nompersonnage;
    }

    /**
     * @param string $nompersonnage
     */
    public function setNompersonnage($nompersonnage)
    {
        $this->nompersonnage = $nompersonnage;
    }

    /**
     * @return string
     */
    public function getBattletag()
    {
        return $this->battletag;
    }

    /**
     * @param string $battletag
     */
    public function setBattletag($battletag)
    {
        $this->battletag = $battletag;
    }

    /**
     * @return string
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param string $classe
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
    }

    /**
     * @return string
     */
    public function getSpecialisation()
    {
        return $this->specialisation;
    }

    /**
     * @param string $specialisation
     */
    public function setSpecialisation($specialisation)
    {
        $this->specialisation = $specialisation;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
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
        $this->groupe = $groupe;
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
}

