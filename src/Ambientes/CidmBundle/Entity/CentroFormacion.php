<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CentroFormacion
 *
 * @ORM\Table(name="centro_formacion", indexes={@ORM\Index(name="FK_RELATIONSHIP_1", columns={"ID_REGIONAL"})})
 * @ORM\Entity
 */
class CentroFormacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_CENTRO", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCentro;

    /**
     * @var integer
     *
     * @ORM\Column(name="CODIGO", type="integer", nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPCION", type="string", length=500, nullable=true)
     */
    private $descripcion;

    /**
     * @var \Ambientes\CidmBundle\Entity\Regional
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Regional")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_REGIONAL", referencedColumnName="ID_REGIONAL")
     * })
     */
    private $idRegional;



    /**
     * Get idCentro
     *
     * @return integer 
     */
    public function getIdCentro()
    {
        return $this->idCentro;
    }

     public function __toString() {
          return $this->idCentro;
          return (string) $this->idCentro;
       }    
    /**
     * Set codigo
     *
     * @param integer $codigo
     * @return CentroFormacion
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
     * @return CentroFormacion
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

    /**
     * Set idRegional
     *
     * @param \Ambientes\CidmBundle\Entity\Regional $idRegional
     * @return CentroFormacion
     */
    public function setIdRegional(\Ambientes\CidmBundle\Entity\Regional $idRegional = null)
    {
        $this->idRegional = $idRegional;

        return $this;
    }

    /**
     * Get idRegional
     *
     * @return \Ambientes\CidmBundle\Entity\Regional 
     */
    public function getIdRegional()
    {
        return $this->idRegional;
    }
}
