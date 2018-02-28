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
    private $idutilisateur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idutilisateur = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
