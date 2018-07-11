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

