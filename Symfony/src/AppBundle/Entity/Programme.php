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
    private $id;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idnutrition = new \Doctrine\Common\Collections\ArrayCollection();
        $this->identrainement = new \Doctrine\Common\Collections\ArrayCollection();
        $this->id = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nomprogramme
     *
     * @param string $nomprogramme
     *
     * @return Programme
     */
    public function setNomprogramme($nomprogramme)
    {
        $this->nomprogramme = $nomprogramme;

        return $this;
    }

    /**
     * Get nomprogramme
     *
     * @return string
     */
    public function getNomprogramme()
    {
        return $this->nomprogramme;
    }

    /**
     * Set dureetotaleprogramme
     *
     * @param integer $dureetotaleprogramme
     *
     * @return Programme
     */
    public function setDureetotaleprogramme($dureetotaleprogramme)
    {
        $this->dureetotaleprogramme = $dureetotaleprogramme;

        return $this;
    }

    /**
     * Get dureetotaleprogramme
     *
     * @return integer
     */
    public function getDureetotaleprogramme()
    {
        return $this->dureetotaleprogramme;
    }

    /**
     * Set typeprogramme
     *
     * @param string $typeprogramme
     *
     * @return Programme
     */
    public function setTypeprogramme($typeprogramme)
    {
        $this->typeprogramme = $typeprogramme;

        return $this;
    }

    /**
     * Get typeprogramme
     *
     * @return string
     */
    public function getTypeprogramme()
    {
        return $this->typeprogramme;
    }

    /**
     * Get idprogramme
     *
     * @return integer
     */
    public function getIdprogramme()
    {
        return $this->idprogramme;
    }

    /**
     * Set idsport
     *
     * @param \AppBundle\Entity\Sport $idsport
     *
     * @return Programme
     */
    public function setIdsport(\AppBundle\Entity\Sport $idsport = null)
    {
        $this->idsport = $idsport;

        return $this;
    }

    /**
     * Get idsport
     *
     * @return \AppBundle\Entity\Sport
     */
    public function getIdsport()
    {
        return $this->idsport;
    }

    /**
     * Add idnutrition
     *
     * @param \AppBundle\Entity\Nutrition $idnutrition
     *
     * @return Programme
     */
    public function addIdnutrition(\AppBundle\Entity\Nutrition $idnutrition)
    {
        $this->idnutrition[] = $idnutrition;

        return $this;
    }

    /**
     * Remove idnutrition
     *
     * @param \AppBundle\Entity\Nutrition $idnutrition
     */
    public function removeIdnutrition(\AppBundle\Entity\Nutrition $idnutrition)
    {
        $this->idnutrition->removeElement($idnutrition);
    }

    /**
     * Get idnutrition
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdnutrition()
    {
        return $this->idnutrition;
    }

    /**
     * Add identrainement
     *
     * @param \AppBundle\Entity\Entrainement $identrainement
     *
     * @return Programme
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
     * Add id
     *
     * @param \AppBundle\Entity\Utilisateur $id
     *
     * @return Programme
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
