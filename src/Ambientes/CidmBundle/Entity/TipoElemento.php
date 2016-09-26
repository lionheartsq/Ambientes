<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoElemento
 *
 * @ORM\Table(name="tipo_elemento")
 * @ORM\Entity
 */
class TipoElemento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_TIPO_ELEMENTO", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipoElemento;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPCION", type="string", length=500, nullable=true)
     */
    private $descripcion;



    /**
     * Get idTipoElemento
     *
     * @return integer 
     */
    public function getIdTipoElemento()
    {
        return $this->idTipoElemento;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return TipoElemento
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