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
    private $id;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idprogramme = new \Doctrine\Common\Collections\ArrayCollection();
        $this->id = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nomentrainement
     *
     * @param string $nomentrainement
     *
     * @return Entrainement
     */
    public function setNomentrainement($nomentrainement)
    {
        $this->nomentrainement = $nomentrainement;

        return $this;
    }

    /**
     * Get nomentrainement
     *
     * @return string
     */
    public function getNomentrainement()
    {
        return $this->nomentrainement;
    }

    /**
     * Set datedebutentrainement
     *
     * @param \DateTime $datedebutentrainement
     *
     * @return Entrainement
     */
    public function setDatedebutentrainement($datedebutentrainement)
    {
        $this->datedebutentrainement = $datedebutentrainement;

        return $this;
    }

    /**
     * Get datedebutentrainement
     *
     * @return \DateTime
     */
    public function getDatedebutentrainement()
    {
        return $this->datedebutentrainement;
    }

    /**
     * Set datefinentrainement
     *
     * @param \DateTime $datefinentrainement
     *
     * @return Entrainement
     */
    public function setDatefinentrainement($datefinentrainement)
    {
        $this->datefinentrainement = $datefinentrainement;

        return $this;
    }

    /**
     * Get datefinentrainement
     *
     * @return \DateTime
     */
    public function getDatefinentrainement()
    {
        return $this->datefinentrainement;
    }

    /**
     * Set descriptionentrainement
     *
     * @param string $descriptionentrainement
     *
     * @return Entrainement
     */
    public function setDescriptionentrainement($descriptionentrainement)
    {
        $this->descriptionentrainement = $descriptionentrainement;

        return $this;
    }

    /**
     * Get descriptionentrainement
     *
     * @return string
     */
    public function getDescriptionentrainement()
    {
        return $this->descriptionentrainement;
    }

    /**
     * Set niveaudifficulte
     *
     * @param integer $niveaudifficulte
     *
     * @return Entrainement
     */
    public function setNiveaudifficulte($niveaudifficulte)
    {
        $this->niveaudifficulte = $niveaudifficulte;

        return $this;
    }

    /**
     * Get niveaudifficulte
     *
     * @return integer
     */
    public function getNiveaudifficulte()
    {
        return $this->niveaudifficulte;
    }

    /**
     * Set recordentrainement
     *
     * @param \DateTime $recordentrainement
     *
     * @return Entrainement
     */
    public function setRecordentrainement($recordentrainement)
    {
        $this->recordentrainement = $recordentrainement;

        return $this;
    }

    /**
     * Get recordentrainement
     *
     * @return \DateTime
     */
    public function getRecordentrainement()
    {
        return $this->recordentrainement;
    }

    /**
     * Set estvisible
     *
     * @param boolean $estvisible
     *
     * @return Entrainement
     */
    public function setEstvisible($estvisible)
    {
        $this->estvisible = $estvisible;

        return $this;
    }

    /**
     * Get estvisible
     *
     * @return boolean
     */
    public function getEstvisible()
    {
        return $this->estvisible;
    }

    /**
     * Get identrainement
     *
     * @return integer
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
     * @return Entrainement
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

    /**
     * Add id
     *
     * @param \AppBundle\Entity\Utilisateur $id
     *
     * @return Entrainement
     */
    public function addId(\AppBundle\Entity\Utilisateur $id)
    {
        $this->id[] = $id;

        return $this;
    }

    /**
     * Remove id
     *
     * @param \AppBundle\Entity\Utilisateur $id
     */
    public function removeId(\AppBundle\Entity\Utilisateur $id)
    {
        $this->id->removeElement($id);
    }

    /**
     * Get id
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getId()
    {
        return $this->id;
    }
}
