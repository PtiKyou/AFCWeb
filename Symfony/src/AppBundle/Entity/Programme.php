<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Programme
 *
 * @ORM\Table(name="Programme", indexes={@ORM\Index(name="FK_Programme_IDSport", columns={"IDSport"})})
 * @ORM\Entity
 */
class Programme
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomProgramme", type="string", length=25, nullable=true)
     */
    private $nomprogramme;

    /**
     * @var integer
     *
     * @ORM\Column(name="dureeTotaleProgramme", type="integer", nullable=true)
     */
    private $dureetotaleprogramme;

    /**
     * @var string
     *
     * @ORM\Column(name="typeProgramme", type="string", length=25, nullable=true)
     */
    private $typeprogramme;

    /**
     * @var integer
     *
     * @ORM\Column(name="IDProgramme", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprogramme;

    /**
     * @var \AppBundle\Entity\Sport
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sport")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDSport", referencedColumnName="IDSport")
     * })
     */
    private $idsport;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Nutrition", inversedBy="idprogramme")
     * @ORM\JoinTable(name="conseil",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDProgramme", referencedColumnName="IDProgramme")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDNutrition", referencedColumnName="IDNutrition")
     *   }
     * )
     */
    private $idnutrition;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Entrainement", mappedBy="idprogramme")
     */
    private $identrainement;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Utilisateur", mappedBy="idprogramme")
     */
    private $idutilisateur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idnutrition = new \Doctrine\Common\Collections\ArrayCollection();
        $this->identrainement = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idutilisateur = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

