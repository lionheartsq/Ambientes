<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ingreso
 *
 * @ORM\Table(name="ingreso", indexes={@ORM\Index(name="FK_RELATIONSHIP_26", columns={"ID_ESTADO"}), @ORM\Index(name="FK_RELATIONSHIP_27", columns={"ID_USUARIO"})})
 * @ORM\Entity
 */
class Ingreso
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_INGRESO", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idIngreso;

    /**
     * @var string
     *
     * @ORM\Column(name="TAG", type="string", length=250, nullable=true)
     */
    private $tag;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_COMPLETA", type="date", nullable=true)
     */
    private $fechaCompleta;

    /**
     * @var \Ambientes\CidmBundle\Entity\Estado
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Estado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ESTADO", referencedColumnName="ID_ESTADO")
     * })
     */
    private $idEstado;

    /**
     * @var \Ambientes\CidmBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_USUARIO", referencedColumnName="ID_USUARIO")
     * })
     */
    private $idUsuario;



    /**
     * Get idIngreso
     *
     * @return integer 
     */
    public function getIdIngreso()
    {
        return $this->idIngreso;
    }

    /**
     * Set tag
     *
     * @param string $tag
     * @return Ingreso
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set fechaCompleta
     *
     * @param \DateTime $fechaCompleta
     * @return Ingreso
     */
    public function setFechaCompleta($fechaCompleta)
    {
        $this->fechaCompleta = $fechaCompleta;

        return $this;
    }

    /**
     * Get fechaCompleta
     *
     * @return \DateTime 
     */
    public function getFechaCompleta()
    {
        return $this->fechaCompleta;
    }

    /**
     * Set idEstado
     *
     * @param \Ambientes\CidmBundle\Entity\Estado $idEstado
     * @return Ingreso
     */
    public function setIdEstado(\Ambientes\CidmBundle\Entity\Estado $idEstado = null)
    {
        $this->idEstado = $idEstado;

        return $this;
    }

    /**
     * Get idEstado
     *
     * @return \Ambientes\CidmBundle\Entity\Estado 
     */
    public function getIdEstado()
    {
        return $this->idEstado;
    }

    /**
     * Set idUsuario
     *
     * @param \Ambientes\CidmBundle\Entity\Usuario $idUsuario
     * @return Ingreso
     */
    public function setIdUsuario(\Ambientes\CidmBundle\Entity\Usuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \Ambientes\CidmBundle\Entity\Usuario 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}
