<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table(name="Utilisateur", uniqueConstraints={@ORM\UniqueConstraint(name="emailUtilisateur", columns={"emailUtilisateur"})}, indexes={@ORM\Index(name="FK_Utilisateur_IDStat", columns={"IDStat"})})
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="emailUtilisateur", type="string", length=50, nullable=true)
     */
    private $emailutilisateur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="emailEstVisible", type="boolean", nullable=true)
     */
    private $emailestvisible;

    /**
     * @var string
     *
     * @ORM\Column(name="nomUtilisateur", type="string", length=25, nullable=true)
     */
    private $nomutilisateur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="nomEstVisible", type="boolean", nullable=true)
     */
    private $nomestvisible;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomUtilisateur", type="string", length=25, nullable=true)
     */
    private $prenomutilisateur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="prenomEstVisible", type="boolean", nullable=true)
     */
    private $prenomestvisible;

    /**
     * @var integer
     *
     * @ORM\Column(name="ageUilisateur", type="integer", nullable=true)
     */
    private $ageuilisateur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ageEstVisible", type="boolean", nullable=true)
     */
    private $ageestvisible;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sexeUtilisateur", type="boolean", nullable=true)
     */
    private $sexeutilisateur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sexeEstVisible", type="boolean", nullable=true)
     */
    private $sexeestvisible;

    /**
     * @var integer
     *
     * @ORM\Column(name="tailleUtilisateur", type="integer", nullable=true)
     */
    private $tailleutilisateur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tailleEstVisible", type="boolean", nullable=true)
     */
    private $tailleestvisible;

    /**
     * @var integer
     *
     * @ORM\Column(name="poidsUtilisateur", type="integer", nullable=true)
     */
    private $poidsutilisateur;

    /**
     * @var boolean
     *
     * @ORM\Column(name="poidsEstVisible", type="boolean", nullable=true)
     */
    private $poidsestvisible;

    /**
     * @var string
     *
     * @ORM\Column(name="pseudoUtilisateur", type="string", length=25, nullable=true)
     */
    private $pseudoutilisateur;

    /**
     * @var string
     *
     * @ORM\Column(name="motDePasseUtilisateur", type="string", length=25, nullable=true)
     */
    private $motdepasseutilisateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="IDUtilisateur", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idutilisateur;

    /**
     * @var \AppBundle\Entity\Statistiques
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Statistiques")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDStat", referencedColumnName="IDStat")
     * })
     */
    private $idstat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="idutilisateur")
     * @ORM\JoinTable(name="amis",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDUtilisateur", referencedColumnName="IDUtilisateur")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDUtilisateur_1", referencedColumnName="IDUtilisateur")
     *   }
     * )
     */
    private $idutilisateur1;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Groupe", inversedBy="idutilisateur")
     * @ORM\JoinTable(name="appartientg",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDUtilisateur", referencedColumnName="IDUtilisateur")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDGroupe", referencedColumnName="IDGroupe")
     *   }
     * )
     */
    private $idgroupe;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Entrainement", inversedBy="idutilisateur")
     * @ORM\JoinTable(name="faite",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDUtilisateur", referencedColumnName="IDUtilisateur")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDEntrainement", referencedColumnName="IDEntrainement")
     *   }
     * )
     */
    private $identrainement;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Programme", inversedBy="idutilisateur")
     * @ORM\JoinTable(name="faitp",
     *   joinColumns={
     *     @ORM\JoinColumn(name="IDUtilisateur", referencedColumnName="IDUtilisateur")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDProgramme", referencedColumnName="IDProgramme")
     *   }
     * )
     */
    private $idprogramme;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idutilisateur1 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idgroupe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->identrainement = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idprogramme = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

