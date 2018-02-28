<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statistiques
 *
 * @ORM\Table(name="Statistiques", indexes={@ORM\Index(name="FK_Statistiques_IDUtilisateur", columns={"IDUtilisateur"})})
 * @ORM\Entity
 */
class Statistiques
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="tempsMoyenStat", type="datetime", nullable=false)
     */
    private $tempsmoyenstat = 'CURRENT_TIMESTAMP';

    /**
     * @var boolean
     *
     * @ORM\Column(name="tempsMoyenStatEstVisible", type="boolean", nullable=true)
     */
    private $tempsmoyenstatestvisible;

    /**
     * @var integer
     *
     * @ORM\Column(name="vitesseMoyennneStat", type="integer", nullable=true)
     */
    private $vitessemoyennnestat;

    /**
     * @var boolean
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
     * @var boolean
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
     * @var boolean
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
     * @var boolean
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
     *   @ORM\JoinColumn(name="IDUtilisateur", referencedColumnName="IDUtilisateur")
     * })
     */
    private $idutilisateur;


}

