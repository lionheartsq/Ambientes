<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regional
 *
 * @ORM\Table(name="regional")
 * @ORM\Entity
 */
class Regional
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_REGIONAL", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRegional;

    /**
     * @var integer
     *
     * @ORM\Column(name="CODIGO", type="integer", nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPCION", type="string", length=500, nullable=false)
     */
    private $descripcion;



    /**
     * Get idRegional
     *
     * @return integer 
     */
    public function getIdRegional()
    {
        return $this->idRegional;
    }
    
     public function __toString() {
          return $this->idRegional;
          return (string) $this->idRegional;
       }
    /**
     * Set codigo
     *
     * @param integer $codigo
     * @return Regional
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return integer 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Regional
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
