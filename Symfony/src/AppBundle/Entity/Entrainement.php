<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entrainement
 *
 * @ORM\Table(name="Entrainement")
 * @ORM\Entity
 */
class Entrainement
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomEntrainement", type="string", length=25, nullable=true)
     */
    private $nomentrainement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebutEntrainement", type="date", nullable=true)
     */
    private $datedebutentrainement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinEntrainement", type="date", nullable=true)
     */
    private $datefinentrainement;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionEntrainement", type="string", length=500, nullable=true)
     */
    private $descriptionentrainement;

    /**
     * @var integer
     *
     * @ORM\Column(name="niveauDifficulte", type="integer", nullable=true)
     */
    private $niveaudifficulte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="recordEntrainement", type="datetime", nullable=false)
     */
    private $recordentrainement = 'CURRENT_TIMESTAMP';

    /**
     * @var boolean
     *
     * @ORM\Column(name="estVisible", type="boolean", nullable=true)
     */
    private $estvisible;

    /**
     * @var integer
     *
     * @ORM\Column(name="IDEntrainement", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $identrainement;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Programme", inversedBy="identrainement")
     * @ORM\JoinTable(name="contient",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDEntrainement", referencedColumnName="IDEntrainement")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDProgramme", referencedColumnName="IDProgramme")
     *   }
     * )
     */
    private $idprogramme;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Utilisateur", mappedBy="identrainement")
     */
    private $idutilisateur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idprogramme = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idutilisateur = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

