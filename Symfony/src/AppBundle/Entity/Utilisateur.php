<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Utilisateur
 *
 * @ORM\Table(name="Utilisateur")
 * @ORM\Entity
 */
class Utilisateur extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="emailEstVisible", type="integer", nullable=true)
     */
    private $emailestvisible;

    /**
     * @var string
     *
     * @ORM\Column(name="nomUtilisateur", type="string", length=25, nullable=true)
     */
    private $nomutilisateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="nomEstVisible", type="integer", nullable=true)
     */
    private $nomestvisible;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomUtilisateur", type="string", length=25, nullable=true)
     */
    private $prenomutilisateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="prenomEstVisible", type="integer", nullable=true)
     */
    private $prenomestvisible;

    /**
     * @var integer
     *
     * @ORM\Column(name="ageUilisateur", type="integer", nullable=true)
     */
    private $ageuilisateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="ageEstVisible", type="integer", nullable=true)
     */
    private $ageestvisible;

    /**
     * @var integer
     *
     * @ORM\Column(name="sexeUtilisateur", type="integer", nullable=true)
     */
    private $sexeutilisateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="sexeEstVisible", type="integer", nullable=true)
     */
    private $sexeestvisible;

    /**
     * @var integer
     *
     * @ORM\Column(name="tailleUtilisateur", type="integer", nullable=true)
     */
    private $tailleutilisateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="tailleEstVisible", type="integer", nullable=true)
     */
    private $tailleestvisible;

    /**
     * @var integer
     *
     * @ORM\Column(name="poidsUtilisateur", type="integer", nullable=true)
     */
    private $poidsutilisateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="poidsEstVisible", type="integer", nullable=true)
     */
    private $poidsestvisible;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=100, nullable=true)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookId", type="string", length=50, nullable=true)
     */
    private $facebookid;

    /**
     * @var string
     *
     * @ORM\Column(name="googleId", type="string", length=50, nullable=true)
     */
    private $googleid;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Utilisateur", inversedBy="id")
     * @ORM\JoinTable(name="amis",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="id_Utilisateur", referencedColumnName="id")
     *   }
     * )
     */
    private $idUtilisateur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Groupe", inversedBy="id")
     * @ORM\JoinTable(name="appartientg",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id", referencedColumnName="id")
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Entrainement", inversedBy="id")
     * @ORM\JoinTable(name="faite",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id", referencedColumnName="id")
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Programme", inversedBy="id")
     * @ORM\JoinTable(name="faitp",
     *   joinColumns={
     *     @ORM\JoinColumn(name="id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="IDProgramme", referencedColumnName="IDProgramme")
     *   }
     * )
     */
    private $idprogramme;


    /**
    * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true)
    */
    private $facebookId;

    private $facebookAccessToken;

    /**
    * @return integer
    */
    public function getId()
    {
      return $this->id;
    }

    /**
    * @param string $facebookId
    * @return User
    */
    public function setFacebookId($facebookId)
    {
      $this->facebookId = $facebookId;

      return $this;
    }

    /**
    * @return string
    */
    public function getFacebookId()
    {
      return $this->facebookId;
    }

    /**
    * @param string $facebookAccessToken
    * @return User
    */
    public function setFacebookAccessToken($facebookAccessToken)
    {
      $this->facebookAccessToken = $facebookAccessToken;

      return $this;
    }

    /**
    * @return string
    */
    public function getFacebookAccessToken()
    {
      return $this->facebookAccessToken;
    }






    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->idUtilisateur = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idgroupe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->identrainement = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idprogramme = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set emailestvisible
     *
     * @param integer $emailestvisible
     *
     * @return Utilisateur
     */
    public function setEmailestvisible($emailestvisible)
    {
        $this->emailestvisible = $emailestvisible;

        return $this;
    }

    /**
     * Get emailestvisible
     *
     * @return integer
     */
    public function getEmailestvisible()
    {
        return $this->emailestvisible;
    }

    /**
     * Set nomutilisateur
     *
     * @param string $nomutilisateur
     *
     * @return Utilisateur
     */
    public function setNomutilisateur($nomutilisateur)
    {
        $this->nomutilisateur = $nomutilisateur;

        return $this;
    }

    /**
     * Get nomutilisateur
     *
     * @return string
     */
    public function getNomutilisateur()
    {
        return $this->nomutilisateur;
    }

    /**
     * Set nomestvisible
     *
     * @param integer $nomestvisible
     *
     * @return Utilisateur
     */
    public function setNomestvisible($nomestvisible)
    {
        $this->nomestvisible = $nomestvisible;

        return $this;
    }

    /**
     * Get nomestvisible
     *
     * @return integer
     */
    public function getNomestvisible()
    {
        return $this->nomestvisible;
    }

    /**
     * Set prenomutilisateur
     *
     * @param string $prenomutilisateur
     *
     * @return Utilisateur
     */
    public function setPrenomutilisateur($prenomutilisateur)
    {
        $this->prenomutilisateur = $prenomutilisateur;

        return $this;
    }

    /**
     * Get prenomutilisateur
     *
     * @return string
     */
    public function getPrenomutilisateur()
    {
        return $this->prenomutilisateur;
    }

    /**
     * Set prenomestvisible
     *
     * @param integer $prenomestvisible
     *
     * @return Utilisateur
     */
    public function setPrenomestvisible($prenomestvisible)
    {
        $this->prenomestvisible = $prenomestvisible;

        return $this;
    }

    /**
     * Get prenomestvisible
     *
     * @return integer
     */
    public function getPrenomestvisible()
    {
        return $this->prenomestvisible;
    }

    /**
     * Set ageuilisateur
     *
     * @param integer $ageuilisateur
     *
     * @return Utilisateur
     */
    public function setAgeutilisateur($ageuilisateur)
    {
        $this->ageuilisateur = $ageuilisateur;

        return $this;
    }

    /**
     * Get ageuilisateur
     *
     * @return integer
     */
    public function getAgeutilisateur()
    {
        return $this->ageuilisateur;
    }

    /**
     * Set ageestvisible
     *
     * @param integer $ageestvisible
     *
     * @return Utilisateur
     */
    public function setAgeestvisible($ageestvisible)
    {
        $this->ageestvisible = $ageestvisible;

        return $this;
    }

    /**
     * Get ageestvisible
     *
     * @return integer
     */
    public function getAgeestvisible()
    {
        return $this->ageestvisible;
    }

    /**
     * Set sexeutilisateur
     *
     * @param integer $sexeutilisateur
     *
     * @return Utilisateur
     */
    public function setSexeutilisateur($sexeutilisateur)
    {
        $this->sexeutilisateur = $sexeutilisateur;

        return $this;
    }

    /**
     * Get sexeutilisateur
     *
     * @return integer
     */
    public function getSexeutilisateur()
    {
        return $this->sexeutilisateur;
    }

    /**
     * Set sexeestvisible
     *
     * @param integer $sexeestvisible
     *
     * @return Utilisateur
     */
    public function setSexeestvisible($sexeestvisible)
    {
        $this->sexeestvisible = $sexeestvisible;

        return $this;
    }

    /**
     * Get sexeestvisible
     *
     * @return integer
     */
    public function getSexeestvisible()
    {
        return $this->sexeestvisible;
    }

    /**
     * Set tailleutilisateur
     *
     * @param integer $tailleutilisateur
     *
     * @return Utilisateur
     */
    public function setTailleutilisateur($tailleutilisateur)
    {
        $this->tailleutilisateur = $tailleutilisateur;

        return $this;
    }

    /**
     * Get tailleutilisateur
     *
     * @return integer
     */
    public function getTailleutilisateur()
    {
        return $this->tailleutilisateur;
    }

    /**
     * Set tailleestvisible
     *
     * @param integer $tailleestvisible
     *
     * @return Utilisateur
     */
    public function setTailleestvisible($tailleestvisible)
    {
        $this->tailleestvisible = $tailleestvisible;

        return $this;
    }

    /**
     * Get tailleestvisible
     *
     * @return integer
     */
    public function getTailleestvisible()
    {
        return $this->tailleestvisible;
    }

    /**
     * Set poidsutilisateur
     *
     * @param integer $poidsutilisateur
     *
     * @return Utilisateur
     */
    public function setPoidsutilisateur($poidsutilisateur)
    {
        $this->poidsutilisateur = $poidsutilisateur;

        return $this;
    }

    /**
     * Get poidsutilisateur
     *
     * @return integer
     */
    public function getPoidsutilisateur()
    {
        return $this->poidsutilisateur;
    }

    /**
     * Set poidsestvisible
     *
     * @param integer $poidsestvisible
     *
     * @return Utilisateur
     */
    public function setPoidsestvisible($poidsestvisible)
    {
        $this->poidsestvisible = $poidsestvisible;

        return $this;
    }

    /**
     * Get poidsestvisible
     *
     * @return integer
     */
    public function getPoidsestvisible()
    {
        return $this->poidsestvisible;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return Utilisateur
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set googleid
     *
     * @param string $googleid
     *
     * @return Utilisateur
     */
    public function setGoogleid($googleid)
    {
        $this->googleid = $googleid;

        return $this;
    }

    /**
     * Get googleid
     *
     * @return string
     */
    public function getGoogleid()
    {
        return $this->googleid;
    }

    /**
     * Add idUtilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $idUtilisateur
     *
     * @return Utilisateur
     */
    public function addIdUtilisateur(\AppBundle\Entity\Utilisateur $idUtilisateur)
    {
        $this->idUtilisateur[] = $idUtilisateur;

        return $this;
    }

    /**
     * Remove idUtilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $idUtilisateur
     */
    public function removeIdUtilisateur(\AppBundle\Entity\Utilisateur $idUtilisateur)
    {
        $this->idUtilisateur->removeElement($idUtilisateur);
    }

    /**
     * Get idUtilisateur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * Add idgroupe
     *
     * @param \AppBundle\Entity\Groupe $idgroupe
     *
     * @return Utilisateur
     */
    public function addIdgroupe(\AppBundle\Entity\Groupe $idgroupe)
    {
        $this->idgroupe[] = $idgroupe;

        return $this;
    }

    /**
     * Remove idgroupe
     *
     * @param \AppBundle\Entity\Groupe $idgroupe
     */
    public function removeIdgroupe(\AppBundle\Entity\Groupe $idgroupe)
    {
        $this->idgroupe->removeElement($idgroupe);
    }

    /**
     * Get idgroupe
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdgroupe()
    {
        return $this->idgroupe;
    }

    /**
     * Add identrainement
     *
     * @param \AppBundle\Entity\Entrainement $identrainement
     *
     * @return Utilisateur
     */
    public function addIdentrainement(\AppBundle\Entity\Entrainement $identrainement)
    {
        $this->identrainement[] = $identrainement;

        return $this;
    }

    /**
     * Remove identrainement
     *
     * @param \AppBundle\Entity\Entrainement $identrainement
     */
    public function removeIdentrainement(\AppBundle\Entity\Entrainement $identrainement)
    {
        $this->identrainement->removeElement($identrainement);
    }

    /**
     * Get identrainement
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdentrainement()
    {
        return $this->identrainement;
    }

    /**
     * Add idprogramme
     *
     * @param \AppBundle\Entity\Programme $idprogramme
     *
     * @return Utilisateur
     */
    public function addIdprogramme(\AppBundle\Entity\Programme $idprogramme)
    {
        $this->idprogramme[] = $idprogramme;

        return $this;
    }

    /**
     * Remove idprogramme
     *
     * @param \AppBundle\Entity\Programme $idprogramme
     */
    public function removeIdprogramme(\AppBundle\Entity\Programme $idprogramme)
    {
        $this->idprogramme->removeElement($idprogramme);
    }

    /**
     * Get idprogramme
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdprogramme()
    {
        return $this->idprogramme;
    }









}
