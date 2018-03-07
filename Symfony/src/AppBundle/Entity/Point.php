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
     * @ORM\Column(name="ordrePoints", type="integer", nullable=true)
     */
    private $ordrepoints;

    /**
     * @var float
     *
     * @ORM\Column(name="longitudePoint", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitudepoint;

    /**
     * @var float
     *
     * @ORM\Column(name="latitudePoint", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitudepoint;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePoint", type="datetime", nullable=true)
     */
    private $datepoint;

    /**
     * @var integer
     *
     * @ORM\Column(name="altitudePoint", type="integer", nullable=true)
     */
    private $altitudepoint;

    /**
     * @var integer
     *
     * @ORM\Column(name="IDPoint", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpoint;

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

