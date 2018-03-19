<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Defis
 *
 * @ORM\Table(name="Defis")
 * @ORM\Entity
 */
class Defis
{
    /**
     * @var integer
     *
     * @ORM\Column(name="temps", type="integer", nullable=true)
     */
    private $temps;

    /**
     * @var integer
     *
     * @ORM\Column(name="distance", type="integer", nullable=true)
     */
    private $distance;

    /**
     * @var integer
     *
     * @ORM\Column(name="IDDefis", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddefis;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Parcours", inversedBy="iddefis")
     * @ORM\JoinTable(name="contientparcours",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDDefis", referencedColumnName="IDDefis")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDParcours", referencedColumnName="IDParcours")
     *   }
     * )
     */
    private $idparcours;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idparcours = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set temps
     *
     * @param integer $temps
     *
     * @return Defis
     */
    public function setTemps($temps)
    {
        $this->temps = $temps;

        return $this;
    }

    /**
     * Get temps
     *
     * @return integer
     */
    public function getTemps()
    {
        return $this->temps;
    }

    /**
     * Set distance
     *
     * @param integer $distance
     *
     * @return Defis
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return integer
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Get iddefis
     *
     * @return integer
     */
    public function getIddefis()
    {
        return $this->iddefis;
    }

    /**
     * Add idparcour
     *
     * @param \AppBundle\Entity\Parcours $idparcour
     *
     * @return Defis
     */
    public function addIdparcour(\AppBundle\Entity\Parcours $idparcour)
    {
        $this->idparcours[] = $idparcour;

        return $this;
    }

    /**
     * Remove idparcour
     *
     * @param \AppBundle\Entity\Parcours $idparcour
     */
    public function removeIdparcour(\AppBundle\Entity\Parcours $idparcour)
    {
        $this->idparcours->removeElement($idparcour);
    }

    /**
     * Get idparcours
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdparcours()
    {
        return $this->idparcours;
    }
}
