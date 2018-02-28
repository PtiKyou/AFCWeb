<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Point
 *
 * @ORM\Table(name="Point", indexes={@ORM\Index(name="FK_Point_IDParcours", columns={"IDParcours"})})
 * @ORM\Entity
 */
class Point
{
    /**
     * @var integer
     *
     * @ORM\Column(name="longitudePoint", type="integer", nullable=true)
     */
    private $longitudepoint;

    /**
     * @var integer
     *
     * @ORM\Column(name="latitudePoint", type="integer", nullable=true)
     */
    private $latitudepoint;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePoint", type="date", nullable=true)
     */
    private $datepoint;

    /**
     * @var integer
     *
     * @ORM\Column(name="altitudePoint", type="integer", nullable=true)
     */
    private $altitudepoint;

    /**
     * @var string
     *
     * @ORM\Column(name="ordrePoints", type="string", length=25)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ordrepoints;

    /**
     * @var \AppBundle\Entity\Parcours
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Parcours")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDParcours", referencedColumnName="IDParcours")
     * })
     */
    private $idparcours;


}

