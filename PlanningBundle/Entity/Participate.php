<?php

namespace Iut\PlanningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participate
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Iut\PlanningBundle\Entity\ParticipateRepository")
 */
class Participate
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nameUser", type="string", length=255)
     */
    private $nameUser;

    /**
     * @var string
     *
     * @ORM\Column(name="nameActivity", type="string", length=255)
     */
    private $nameActivity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


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
     * Set nameUser
     *
     * @param string $nameUser
     * @return Participate
     */
    public function setNameUser($nameUser)
    {
        $this->nameUser = $nameUser;

        return $this;
    }

    /**
     * Get nameUser
     *
     * @return string 
     */
    public function getNameUser()
    {
        return $this->nameUser;
    }

    /**
     * Set nameActivity
     *
     * @param string $nameActivity
     * @return Participate
     */
    public function setNameActivity($nameActivity)
    {
        $this->nameActivity = $nameActivity;

        return $this;
    }

    /**
     * Get nameActivity
     *
     * @return string 
     */
    public function getNameActivity()
    {
        return $this->nameActivity;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Participate
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}
