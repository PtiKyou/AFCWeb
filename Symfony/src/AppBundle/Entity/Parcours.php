<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parcours
 *
 * @ORM\Table(name="Parcours", indexes={@ORM\Index(name="FK_Parcours_IDEntrainement", columns={"IDEntrainement"})})
 * @ORM\Entity
 */
class Parcours
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomParcours", type="string", length=25, nullable=true)
     */
    private $nomparcours;

    /**
     * @var integer
     *
     * @ORM\Column(name="denivelePosParcours", type="integer", nullable=true)
     */
    private $deniveleposparcours;

    /**
     * @var integer
     *
     * @ORM\Column(name="deniveleNegParcours", type="integer", nullable=true)
     */
    private $denivelenegparcours;

    /**
     * @var integer
     *
     * @ORM\Column(name="IDParcours", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idparcours;

    /**
     * @var \AppBundle\Entity\Entrainement
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Entrainement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDEntrainement", referencedColumnName="IDEntrainement")
     * })
     */
    private $identrainement;


}

