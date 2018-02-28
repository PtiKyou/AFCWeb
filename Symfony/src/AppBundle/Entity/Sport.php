<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sport
 *
 * @ORM\Table(name="Sport")
 * @ORM\Entity
 */
class Sport
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomSport", type="string", length=25, nullable=true)
     */
    private $nomsport;

    /**
     * @var integer
     *
     * @ORM\Column(name="IDSport", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsport;


}

