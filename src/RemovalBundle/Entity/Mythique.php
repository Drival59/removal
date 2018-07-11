<?php

namespace RemovalBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Mythique
 *
 * @ORM\Table(name="mythique")
 * @ORM\Entity(repositoryClass="RemovalBundle\Repository\MythiqueRepository")
 */
class Mythique
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="chef_du_groupe", type="string", length=255)
     */
    private $chefDuGroupe;

    /**
     * @var string
     *
     * @ORM\Column(name="discord", type="string", length=255)
     */
    private $discord;

    /**
     * @var int
     *
     * @ORM\Column(name="ilvl", type="integer")
     */
    private $ilvl;

    /**
     * @var string
     *
     * @ORM\Column(name="dps1", type="string", length=255)
     */
    private $dps1;

    /**
     * @var string
     *
     * @ORM\Column(name="dps2", type="string", length=255)
     */
    private $dps2;

    /**
     * @var string
     *
     * @ORM\Column(name="dps3", type="string", length=255)
     */
    private $dps3;

    /**
     * @var string
     *
     * @ORM\Column(name="tank", type="string", length=255)
     */
    private $tank;

    /**
     * @var string
     *
     * @ORM\Column(name="heal", type="string", length=255)
     */
    private $heal;

    /**
     * @var string
     *
     * @ORM\Column(name="consommable", type="string", length=255)
     */
    private $consommable;

    /**
     * @var string
     *
     * @ORM\Column(name="skill", type="string", length=255)
     */
    private $skill;

    /**
     * @var string
     *
     * @ORM\Column(name="temps_de_jeu", type="string", length=255)
     */
    private $tempsDeJeu;

    /**
     * @var string
     *
     * @ORM\Column(name="style_de_groupe", type="string", length=255)
     */
    private $styleDeGroupe;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="RemovalBundle\Entity\User", inversedBy="groupe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="battletag", type="string", length=255, nullable=false, unique=false)
     */
    private $battletag;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="RemovalBundle\Entity\Participants", mappedBy="groupe")
     */
    private $participants;

    /**
     * @var string
     * @ORM\Column(name="faction", type="string", length=255, nullable=false, unique=false)
     */
    private $faction;

    /**
     * @return string
     */
    public function getFaction()
    {
        return $this->faction;
    }

    /**
     * @param string $faction
     */
    public function setFaction($faction)
    {
        $this->faction = $faction;
    }

    public function __construct()
    {
        $this->participants = new ArrayCollection();
    }

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
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Mythique
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Mythique
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

    /**
     * Set chefDuGroupe
     *
     * @param string $chefDuGroupe
     *
     * @return Mythique
     */
    public function setChefDuGroupe($chefDuGroupe)
    {
        $this->chefDuGroupe = $chefDuGroupe;

        return $this;
    }

    /**
     * Get chefDuGroupe
     *
     * @return string
     */
    public function getChefDuGroupe()
    {
        return $this->chefDuGroupe;
    }

    /**
     * Set discord
     *
     * @param string $discord
     *
     * @return Mythique
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
     * Set ilvl
     *
     * @param integer $ilvl
     *
     * @return Mythique
     */
    public function setIlvl($ilvl)
    {
        $this->ilvl = $ilvl;

        return $this;
    }

    /**
     * Get ilvl
     *
     * @return int
     */
    public function getIlvl()
    {
        return $this->ilvl;
    }

    /**
     * Set dps1
     *
     * @param string $dps1
     *
     * @return Mythique
     */
    public function setDps1($dps1)
    {
        $this->dps1 = $dps1;

        return $this;
    }

    /**
     * Get dps1
     *
     * @return string
     */
    public function getDps1()
    {
        return $this->dps1;
    }

    /**
     * Set dps2
     *
     * @param string $dps2
     *
     * @return Mythique
     */
    public function setDps2($dps2)
    {
        $this->dps2 = $dps2;

        return $this;
    }

    /**
     * Get dps2
     *
     * @return string
     */
    public function getDps2()
    {
        return $this->dps2;
    }

    /**
     * Set dps3
     *
     * @param string $dps3
     *
     * @return Mythique
     */
    public function setDps3($dps3)
    {
        $this->dps3 = $dps3;

        return $this;
    }

    /**
     * Get dps3
     *
     * @return string
     */
    public function getDps3()
    {
        return $this->dps3;
    }

    /**
     * Set tank
     *
     * @param string $tank
     *
     * @return Mythique
     */
    public function setTank($tank)
    {
        $this->tank = $tank;

        return $this;
    }

    /**
     * Get tank
     *
     * @return string
     */
    public function getTank()
    {
        return $this->tank;
    }

    /**
     * Set heal
     *
     * @param string $heal
     *
     * @return Mythique
     */
    public function setHeal($heal)
    {
        $this->heal = $heal;

        return $this;
    }

    /**
     * Get heal
     *
     * @return string
     */
    public function getHeal()
    {
        return $this->heal;
    }

    /**
     * Set consommable
     *
     * @param string $consommable
     *
     * @return Mythique
     */
    public function setConsommable($consommable)
    {
        $this->consommable = $consommable;

        return $this;
    }

    /**
     * Get consommable
     *
     * @return string
     */
    public function getConsommable()
    {
        return $this->consommable;
    }

    /**
     * Set skill
     *
     * @param string $skill
     *
     * @return Mythique
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get skill
     *
     * @return string
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Set tempsDeJeu
     *
     * @param string $tempsDeJeu
     *
     * @return Mythique
     */
    public function setTempsDeJeu($tempsDeJeu)
    {
        $this->tempsDeJeu = $tempsDeJeu;

        return $this;
    }

    /**
     * Get tempsDeJeu
     *
     * @return string
     */
    public function getTempsDeJeu()
    {
        return $this->tempsDeJeu;
    }

    /**
     * Set styleDeGroupe
     *
     * @param string $styleDeGroupe
     *
     * @return Mythique
     */
    public function setStyleDeGroupe($styleDeGroupe)
    {
        $this->styleDeGroupe = $styleDeGroupe;

        return $this;
    }

    /**
     * Get styleDeGroupe
     *
     * @return string
     */
    public function getStyleDeGroupe()
    {
        return $this->styleDeGroupe;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Mythique
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}

