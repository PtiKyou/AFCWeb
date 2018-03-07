<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Creerdefis
 *
 * @ORM\Table(name="creerDefis", indexes={@ORM\Index(name="FK_creerDefis_IDDefis", columns={"IDDefis"}), @ORM\Index(name="FK_creerDefis_id", columns={"id"}), @ORM\Index(name="IDX_9082E34351637F71", columns={"IDGroupe"})})
 * @ORM\Entity
 */
class Creerdefis
{
    /**
     * @var \AppBundle\Entity\Defis
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Defis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDDefis", referencedColumnName="IDDefis")
     * })
     */
    private $iddefis;

    /**
     * @var \AppBundle\Entity\Groupe
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Groupe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IDGroupe", referencedColumnName="IDGroupe")
     * })
     */
    private $idgroupe;

    /**
     * @var \AppBundle\Entity\Utilisateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}

