<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Constante
 *
 * @ORM\Table(name="Constante", indexes={@ORM\Index(name="FK_Constante_IDSport", columns={"IDSport"})})
 * @ORM\Entity
 */
class Constante
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CaloriesTerrainPlat", type="integer", nullable=true)
     */
    private $caloriesterrainplat;

    /**
     * @var integer
     *
     * @ORM\Column(name="IDConstante", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idconstante;

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
     * Set caloriesterrainplat
     *
     * @param integer $caloriesterrainplat
     *
     * @return Constante
     */
    public function setCaloriesterrainplat($caloriesterrainplat)
    {
        $this->caloriesterrainplat = $caloriesterrainplat;

        return $this;
    }

    /**
     * Get caloriesterrainplat
     *
     * @return integer
     */
    public function getCaloriesterrainplat()
    {
        return $this->caloriesterrainplat;
    }

    /**
     * Get idconstante
     *
     * @return integer
     */
    public function getIdconstante()
    {
        return $this->idconstante;
    }

    /**
     * Set idsport
     *
     * @param \AppBundle\Entity\Sport $idsport
     *
     * @return Constante
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
}
