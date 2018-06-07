<?php

namespace RemovalBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Participation
 *
 * @ORM\Table(name="participation")
 * @ORM\Entity(repositoryClass="RemovalBundle\Repository\ParticipationRepository")
 */
class Participation
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
     * @ORM\Column(name="nom_participation", type="string", length=255, nullable=true)
     */
    private $nomParticipation;

    /**
     * @var string
     *
     * @ORM\Column(name="importance", type="string", length=255, nullable=true)
     */
    private $importance;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_compo_1", type="string", length=255, nullable=true)
     */
    private $nomCompo1;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_compo_1", type="integer", nullable=true)
     */
    private $nbrCompo1;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_compo_2", type="string", length=255, nullable=true)
     */
    private $nomCompo2;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_compo_2", type="integer", nullable=true)
     */
    private $nbrCompo2;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_compo_3", type="string", length=255, nullable=true)
     */
    private $nomCompo3;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_compo_3", type="integer", nullable=true)
     */
    private $nbrCompo3;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_compo_4", type="string", length=255, nullable=true)
     */
    private $nomCompo4;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_compo_4", type="integer", nullable=true)
     */
    private $nbrCompo4;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_compo_5", type="string", length=255, nullable=true)
     */
    private $nomCompo5;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_compo_5", type="integer", nullable=true)
     */
    private $nbrCompo5;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_compo_6", type="string", length=255, nullable=true)
     */
    private $nomCompo6;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_compo_6", type="integer", nullable=true)
     */
    private $nbrCompo6;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_compo_7", type="string", length=255, nullable=true)
     */
    private $nomCompo7;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_compo_7", type="integer", nullable=true)
     */
    private $nbrCompo7;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_compo_8", type="string", length=255, nullable=true)
     */
    private $nomCompo8;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_compo_8", type="integer", nullable=true)
     */
    private $nbrCompo8;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_compo_9", type="string", length=255, nullable=true)
     */
    private $nomCompo9;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_compo_9", type="integer", nullable=true)
     */
    private $nbrCompo9;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_compo_10", type="string", length=255, nullable=true)
     */
    private $nomCompo10;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_compo_10", type="integer", nullable=true)
     */
    private $nbrCompo10;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=true)
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=true)
     */
    private $dateFin;


    /**
     * @var
     * @ORM\OneToMany(targetEntity="RemovalBundle\Entity\Status", mappedBy="participation")
     */
    private $status;

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
     * Participation constructor.
     */
    public function __construct()
    {
        $this->status = new ArrayCollection();
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
     * Set nomParticipation
     *
     * @param string $nomParticipation
     *
     * @return Participation
     */
    public function setNomParticipation($nomParticipation)
    {
        $this->nomParticipation = $nomParticipation;

        return $this;
    }

    /**
     * Get nomParticipation
     *
     * @return string
     */
    public function getNomParticipation()
    {
        return $this->nomParticipation;
    }

    /**
     * Set importance
     *
     * @param string $importance
     *
     * @return Participation
     */
    public function setImportance($importance)
    {
        $this->importance = $importance;

        return $this;
    }

    /**
     * Get importance
     *
     * @return string
     */
    public function getImportance()
    {
        return $this->importance;
    }

    /**
     * Set nomCompo1
     *
     * @param string $nomCompo1
     *
     * @return Participation
     */
    public function setNomCompo1($nomCompo1)
    {
        $this->nomCompo1 = $nomCompo1;

        return $this;
    }

    /**
     * Get nomCompo1
     *
     * @return string
     */
    public function getNomCompo1()
    {
        return $this->nomCompo1;
    }

    /**
     * Set nbrCompo1
     *
     * @param integer $nbrCompo1
     *
     * @return Participation
     */
    public function setNbrCompo1($nbrCompo1)
    {
        $this->nbrCompo1 = $nbrCompo1;

        return $this;
    }

    /**
     * Get nbrCompo1
     *
     * @return int
     */
    public function getNbrCompo1()
    {
        return $this->nbrCompo1;
    }

    /**
     * Set nomCompo2
     *
     * @param string $nomCompo2
     *
     * @return Participation
     */
    public function setNomCompo2($nomCompo2)
    {
        $this->nomCompo2 = $nomCompo2;

        return $this;
    }

    /**
     * Get nomCompo2
     *
     * @return string
     */
    public function getNomCompo2()
    {
        return $this->nomCompo2;
    }

    /**
     * Set nbrCompo2
     *
     * @param integer $nbrCompo2
     *
     * @return Participation
     */
    public function setNbrCompo2($nbrCompo2)
    {
        $this->nbrCompo2 = $nbrCompo2;

        return $this;
    }

    /**
     * Get nbrCompo2
     *
     * @return int
     */
    public function getNbrCompo2()
    {
        return $this->nbrCompo2;
    }

    /**
     * Set nomCompo3
     *
     * @param string $nomCompo3
     *
     * @return Participation
     */
    public function setNomCompo3($nomCompo3)
    {
        $this->nomCompo3 = $nomCompo3;

        return $this;
    }

    /**
     * Get nomCompo3
     *
     * @return string
     */
    public function getNomCompo3()
    {
        return $this->nomCompo3;
    }

    /**
     * Set nbrCompo3
     *
     * @param integer $nbrCompo3
     *
     * @return Participation
     */
    public function setNbrCompo3($nbrCompo3)
    {
        $this->nbrCompo3 = $nbrCompo3;

        return $this;
    }

    /**
     * Get nbrCompo3
     *
     * @return int
     */
    public function getNbrCompo3()
    {
        return $this->nbrCompo3;
    }

    /**
     * Set nomCompo4
     *
     * @param string $nomCompo4
     *
     * @return Participation
     */
    public function setNomCompo4($nomCompo4)
    {
        $this->nomCompo4 = $nomCompo4;

        return $this;
    }

    /**
     * Get nomCompo4
     *
     * @return string
     */
    public function getNomCompo4()
    {
        return $this->nomCompo4;
    }

    /**
     * Set nbrCompo4
     *
     * @param integer $nbrCompo4
     *
     * @return Participation
     */
    public function setNbrCompo4($nbrCompo4)
    {
        $this->nbrCompo4 = $nbrCompo4;

        return $this;
    }

    /**
     * Get nbrCompo4
     *
     * @return int
     */
    public function getNbrCompo4()
    {
        return $this->nbrCompo4;
    }

    /**
     * Set nomCompo5
     *
     * @param string $nomCompo5
     *
     * @return Participation
     */
    public function setNomCompo5($nomCompo5)
    {
        $this->nomCompo5 = $nomCompo5;

        return $this;
    }

    /**
     * Get nomCompo5
     *
     * @return string
     */
    public function getNomCompo5()
    {
        return $this->nomCompo5;
    }

    /**
     * Set nbrCompo5
     *
     * @param integer $nbrCompo5
     *
     * @return Participation
     */
    public function setNbrCompo5($nbrCompo5)
    {
        $this->nbrCompo5 = $nbrCompo5;

        return $this;
    }

    /**
     * Get nbrCompo5
     *
     * @return int
     */
    public function getNbrCompo5()
    {
        return $this->nbrCompo5;
    }

    /**
     * Set nomCompo6
     *
     * @param string $nomCompo6
     *
     * @return Participation
     */
    public function setNomCompo6($nomCompo6)
    {
        $this->nomCompo6 = $nomCompo6;

        return $this;
    }

    /**
     * Get nomCompo6
     *
     * @return string
     */
    public function getNomCompo6()
    {
        return $this->nomCompo6;
    }

    /**
     * Set nbrCompo6
     *
     * @param integer $nbrCompo6
     *
     * @return Participation
     */
    public function setNbrCompo6($nbrCompo6)
    {
        $this->nbrCompo6 = $nbrCompo6;

        return $this;
    }

    /**
     * Get nbrCompo6
     *
     * @return int
     */
    public function getNbrCompo6()
    {
        return $this->nbrCompo6;
    }

    /**
     * Set nomCompo7
     *
     * @param string $nomCompo7
     *
     * @return Participation
     */
    public function setNomCompo7($nomCompo7)
    {
        $this->nomCompo7 = $nomCompo7;

        return $this;
    }

    /**
     * Get nomCompo7
     *
     * @return string
     */
    public function getNomCompo7()
    {
        return $this->nomCompo7;
    }

    /**
     * Set nbrCompo7
     *
     * @param integer $nbrCompo7
     *
     * @return Participation
     */
    public function setNbrCompo7($nbrCompo7)
    {
        $this->nbrCompo7 = $nbrCompo7;

        return $this;
    }

    /**
     * Get nbrCompo7
     *
     * @return int
     */
    public function getNbrCompo7()
    {
        return $this->nbrCompo7;
    }

    /**
     * Set nomCompo8
     *
     * @param string $nomCompo8
     *
     * @return Participation
     */
    public function setNomCompo8($nomCompo8)
    {
        $this->nomCompo8 = $nomCompo8;

        return $this;
    }

    /**
     * Get nomCompo8
     *
     * @return string
     */
    public function getNomCompo8()
    {
        return $this->nomCompo8;
    }

    /**
     * Set nbrCompo8
     *
     * @param integer $nbrCompo8
     *
     * @return Participation
     */
    public function setNbrCompo8($nbrCompo8)
    {
        $this->nbrCompo8 = $nbrCompo8;

        return $this;
    }

    /**
     * Get nbrCompo8
     *
     * @return int
     */
    public function getNbrCompo8()
    {
        return $this->nbrCompo8;
    }

    /**
     * Set nomCompo9
     *
     * @param string $nomCompo9
     *
     * @return Participation
     */
    public function setNomCompo9($nomCompo9)
    {
        $this->nomCompo9 = $nomCompo9;

        return $this;
    }

    /**
     * Get nomCompo9
     *
     * @return string
     */
    public function getNomCompo9()
    {
        return $this->nomCompo9;
    }

    /**
     * Set nbrCompo9
     *
     * @param integer $nbrCompo9
     *
     * @return Participation
     */
    public function setNbrCompo9($nbrCompo9)
    {
        $this->nbrCompo9 = $nbrCompo9;

        return $this;
    }

    /**
     * Get nbrCompo9
     *
     * @return int
     */
    public function getNbrCompo9()
    {
        return $this->nbrCompo9;
    }

    /**
     * Set nomCompo10
     *
     * @param string $nomCompo10
     *
     * @return Participation
     */
    public function setNomCompo10($nomCompo10)
    {
        $this->nomCompo10 = $nomCompo10;

        return $this;
    }

    /**
     * Get nomCompo10
     *
     * @return string
     */
    public function getNomCompo10()
    {
        return $this->nomCompo10;
    }

    /**
     * Set nbrCompo10
     *
     * @param integer $nbrCompo10
     *
     * @return Participation
     */
    public function setNbrCompo10($nbrCompo10)
    {
        $this->nbrCompo10 = $nbrCompo10;

        return $this;
    }

    /**
     * Get nbrCompo10
     *
     * @return int
     */
    public function getNbrCompo10()
    {
        return $this->nbrCompo10;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Participation
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Participation
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Remove utilisateur
     *
     * @param \RemovalBundle\Entity\User $utilisateur
     */
    public function removeUtilisateur(\RemovalBundle\Entity\User $utilisateur)
    {
        $this->utilisateur->removeElement($utilisateur);
    }
}
