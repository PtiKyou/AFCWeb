<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="Groupe")
 * @ORM\Entity
 */
class Groupe
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomGroupe", type="string", length=25, nullable=true)
     */
    private $nomgroupe;

    /**
     * @var integer
     *
     * @ORM\Column(name="IDGroupe", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idgroupe;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Utilisateur", mappedBy="idgroupe")
     */
    private $id;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->id = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get nomgroupe
     *
     * @return string
     */
    public function getNomGroupe()
    {
        return $this->nomgroupe;
    }

    /**
    * @param string $nomgroupe
    * @return Groupe
    */
    public function setNomGroupe($nomgroupe)
    {
      $this->nomgroupe = $nomgroupe;

      return $this;
    }

    /**
     * Get idgoupre
     *
     * @return integer
     */
    public function getIdGroupe()
    {
        return $this->idgroupe;
    }
}
