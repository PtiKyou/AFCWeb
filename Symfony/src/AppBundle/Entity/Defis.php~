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

}

