<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Defisacceptes
 *
 * @ORM\Table(name="DefisAcceptes", indexes={@ORM\Index(name="FK_DefisAcceptes_id", columns={"id"})})
 * @ORM\Entity
 */
class Defisacceptes
{
    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=25, nullable=true)
     */
    private $etat;

    /**
     * @var \AppBundle\Entity\Defis
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Defis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDDefis", referencedColumnName="IDDefis")
     * })
     */
    private $iddefis;

    /**
     * @var \AppBundle\Entity\Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}

