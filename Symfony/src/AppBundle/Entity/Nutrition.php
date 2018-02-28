<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nutrition
 *
 * @ORM\Table(name="Nutrition")
 * @ORM\Entity
 */
class Nutrition
{
    /**
     * @var string
     *
     * @ORM\Column(name="conseil", type="text", length=65535, nullable=true)
     */
    private $conseil;

    /**
     * @var integer
     *
     * @ORM\Column(name="IDNutrition", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnutrition;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Programme", mappedBy="idnutrition")
     */
    private $idprogramme;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idprogramme = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

