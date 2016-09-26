<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ambiente
 *
 * @ORM\Table(name="ambiente", indexes={@ORM\Index(name="FK_RELATIONSHIP_2", columns={"ID_CENTRO"})})
 * @ORM\Entity
 */
class Ambiente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_AMBIENTE", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAmbiente;

    /**
     * @var integer
     *
     * @ORM\Column(name="CODIGO", type="integer", nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE", type="string", length=250, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPCION", type="string", length=500, nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="PUESTOS_TRABAJO", type="integer", nullable=false)
     */
    private $puestosTrabajo;

    /**
     * @var \Ambientes\CidmBundle\Entity\CentroFormacion
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\CentroFormacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_CENTRO", referencedColumnName="ID_CENTRO")
     * })
     */
    private $idCentro;



    /**
     * Get idAmbiente
     *
     * @return integer 
     */
    public function getIdAmbiente()
    {
        return $this->idAmbiente;
    }

     public function __toString() {
          return $this->idAmbiente;
          return (string) $this->idAmbiente;
       }       
    /**
     * Set codigo
     *
     * @param integer $codigo
     * @return Ambiente
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
     * Set nombre
     *
     * @param string $nombre
     * @return Ambiente
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Ambiente
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
     * Set puestosTrabajo
     *
     * @param integer $puestosTrabajo
     * @return Ambiente
     */
    public function setPuestosTrabajo($puestosTrabajo)
    {
        $this->puestosTrabajo = $puestosTrabajo;

        return $this;
    }

    /**
     * Get puestosTrabajo
     *
     * @return integer 
     */
    public function getPuestosTrabajo()
    {
        return $this->puestosTrabajo;
    }

    /**
     * Set idCentro
     *
     * @param \Ambientes\CidmBundle\Entity\CentroFormacion $idCentro
     * @return Ambiente
     */
    public function setIdCentro(\Ambientes\CidmBundle\Entity\CentroFormacion $idCentro = null)
    {
        $this->idCentro = $idCentro;

        return $this;
    }

    /**
     * Get idCentro
     *
     * @return \Ambientes\CidmBundle\Entity\CentroFormacion 
     */
    public function getIdCentro()
    {
        return $this->idCentro;
    }
}
