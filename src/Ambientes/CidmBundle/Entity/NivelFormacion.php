<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NivelFormacion
 *
 * @ORM\Table(name="nivel_formacion")
 * @ORM\Entity
 */
class NivelFormacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_NIVEL", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNivel;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPCION", type="string", length=500, nullable=true)
     */
    private $descripcion;



    /**
     * Get idNivel
     *
     * @return integer 
     */
    public function getIdNivel()
    {
        return $this->idNivel;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return NivelFormacion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
