<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statistiques
 *
 * @ORM\Table(name="Statistiques", indexes={@ORM\Index(name="FK_Statistiques_id", columns={"id"})})
 * @ORM\Entity
 */
class Statistiques
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tempsMoyenStat", type="datetime", nullable=false)
     */
    private $tempsmoyenstat/* = 'CURRENT_TIMESTAMP'*/;

    /**
     * @var integer
     *
     * @ORM\Column(name="tempsMoyenStatEstVisible", type="integer", nullable=true)
     */
    private $tempsmoyenstatestvisible;

    /**
     * @var integer
     *
     * @ORM\Column(name="vitesseMoyennneStat", type="integer", nullable=true)
     */
    private $vitessemoyennnestat;

    /**
     * @var integer
     *
     * @ORM\Column(name="vitesseMoyennneStatEstVisible", type="boolean", nullable=true)
     */
    private $vitessemoyennnestatestvisible;

    /**
     * @var integer
     *
     * @ORM\Column(name="VitesseMaxStat", type="integer", nullable=true)
     */
    private $vitessemaxstat;

    /**
     * @var integer
     *
     * @ORM\Column(name="VitesseMaxStatEstVisible", type="boolean", nullable=true)
     */
    private $vitessemaxstatestvisible;

    /**
     * @var integer
     *
     * @ORM\Column(name="distanceTotaleParcourue", type="integer", nullable=true)
     */
    private $distancetotaleparcourue;

    /**
     * @var integer
     *
     * @ORM\Column(name="distanceTotaleParcourueEstVisible", type="boolean", nullable=true)
     */
    private $distancetotaleparcourueestvisible;

    /**
     * @var integer
     *
     * @ORM\Column(name="distanceMoyenneParcourue", type="integer", nullable=true)
     */
    private $distancemoyenneparcourue;

    /**
     * @var integer
     *
     * @ORM\Column(name="distanceMoyenneParcourueEstVisible", type="boolean", nullable=true)
     */
    private $distancemoyenneparcourueestvisible;

    /**
     * @var integer
     *
     * @ORM\Column(name="IDStat", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idstat;

    /**
     * @var \AppBundle\Entity\Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;






    /**
     * Getters & Setters variables
     */

    /**
     * Get tempsmoyenstat
     *
     * @return \DateTime
     */
    public function getTempsMoyenStat()
    {
        return $this->tempsmoyenstat;
    }

    /**
     * Set tempsmoyenstat
     *
     * @param \DateTime $tempsmoyenstat
     *
     * @return Statistiques
     */
    public function setTempsMoyenStat(DateTime $tempsmoyenstat)
    {
        $this->tempsmoyenstat= $tempsmoyenstat;

        return $this;
    }


    /**
     * Get vitessemoyennnestat
     *
     * @return integer
     */
    public function getVitesseMoyennneStat()
    {
        return $this->vitessemoyennnestat;
    }

    /**
     * Set vitessemoyennnestat
     *
     * @param integer $vitessemoyennnestat
     *
     * @return Statistiques
     */
    public function setVitesseMoyennneStat($vitessemoyennnestat)
    {
        $this->vitessemoyennnestat = $vitessemoyennnestat;

        return $this;
    }


    /**
     * Get vitessemaxstat
     *
     * @return integer
     */
    public function getVitesseMaxStat()
    {
        return $this->vitessemaxstat;
    }

    /**
     * Set vitessemaxstat
     *
     * @param integer $vitessemaxstat
     *
     * @return Statistiques
     */
    public function setVitesseMaxStat($vitessemaxstat)
    {
        $this->vitessemaxstat = $vitessemaxstat;

        return $this;
    }


    /**
     * Get distancetotaleparcourue
     *
     * @return integer
     */
    public function getDistanceTotaleParcourue()
    {
        return $this->distancetotaleparcourue;
    }

    /**
     * Set distancetotaleparcourue
     *
     * @param integer $distancetotaleparcourue
     *
     * @return Statistiques
     */
    public function setDistanceTotaleParcourue($distancetotaleparcourue)
    {
        $this->distancetotaleparcourue = $distancetotaleparcourue;

        return $this;
    }


    /**
     * Get distancemoyenneparcourue
     *
     * @return integer
     */
    public function getDistanceMoyenneParcourue()
    {
        return $this->distancemoyenneparcourue;
    }

    /**
     * Set distancemoyenneparcourue
     *
     * @param integer distancemoyenneparcourue
     *
     * @return Statistiques
     */
    public function setDistanceMoyenneParcourue($distancemoyenneparcourue)
    {
        $this->distancemoyenneparcourue = $distancemoyenneparcourue;

        return $this;
    }




    /**
     * Getters & Setters estVisible
     */

    /**
     * Get tempsmoyenstatestvisible
     *
     * @return integer
     */
    public function getTempsMoyenStatEstVisible()
    {
        return $this->tempsmoyenstatestvisible;
    }

    /**
     * Set tempsmoyenstatestvisible
     *
     * @param integer $tempsmoyenstatestvisible
     *
     * @return Statistiques
     */
    public function setTempsMoyenStatEstVisible($tempsmoyenstatestvisible)
    {
        $this->tempsmoyenstatestvisible = $tempsmoyenstatestvisible;

        return $this;
    }


    /**
     * Get vitessemoyennnestatestvisible
     *
     * @return integer
     */
    public function getVitesseMoyennneStatEstVisible()
    {
        return $this->vitessemoyennnestatestvisible;
    }

    /**
     * Set vitessemoyennnestatestvisible
     *
     * @param integer $vitessemoyennnestatestvisible
     *
     * @return Statistiques
     */
    public function setVitesseMoyennneStatEstVisible($vitessemoyennnestatestvisible)
    {
        $this->vitessemoyennnestatestvisible = $vitessemoyennnestatestvisible;

        return $this;
    }


    /**
     * Get vitessemaxstatestvisible
     *
     * @return integer
     */
    public function getVitesseMaxStatEstVisible()
    {
        return $this->vitessemaxstatestvisible;
    }

    /**
     * Set vitessemaxstatestvisible
     *
     * @param integer $vitessemaxstatestvisible
     *
     * @return Statistiques
     */
    public function setVitesseMaxStatEstVisible($vitessemaxstatestvisible)
    {
        $this->vitessemaxstatestvisible = $vitessemaxstatestvisible;

        return $this;
    }


    /**
     * Get distancetotaleparcourueestvisible
     *
     * @return integer
     */
    public function getDistanceTotaleParcourueEstVisible()
    {
        return $this->distancetotaleparcourueestvisible;
    }

    /**
     * Set distancetotaleparcourueestvisible
     *
     * @param integer $distancetotaleparcourueestvisible
     *
     * @return Statistiques
     */
    public function setDistanceTotaleParcourueEstVisible($distancetotaleparcourueestvisible)
    {
        $this->distancetotaleparcourueestvisible = $distancetotaleparcourueestvisible;

        return $this;
    }


    /**
     * Get distancemoyenneparcourueestvisible
     *
     * @return integer
     */
    public function getDistanceMoyenneParcourueEstVisible()
    {
        return $this->distancemoyenneparcourueestvisible;
    }

    /**
     * Set distancemoyenneparcourueestvisible
     *
     * @param integer distancemoyenneparcourueestvisible
     *
     * @return Statistiques
     */
    public function setDistanceMoyenneParcourueEstVisible($distancemoyenneparcourueestvisible)
    {
        $this->distancemoyenneparcourueestvisible = $distancemoyenneparcourueestvisible;

        return $this;
    }



}
