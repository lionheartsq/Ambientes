<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccesoAmbientes
 *
 * @ORM\Table(name="acceso_ambientes", indexes={@ORM\Index(name="FK_RELATIONSHIP_19", columns={"ID_ESTADO"}), @ORM\Index(name="FK_RELATIONSHIP_20", columns={"ID_EVENTO"})})
 * @ORM\Entity
 */
class AccesoAmbientes
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_ACCESO", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAcceso;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_COMPLETA", type="date", nullable=true)
     */
    private $fechaCompleta;

    /**
     * @var string
     *
     * @ORM\Column(name="OBSERVACIONES", type="string", length=500, nullable=true)
     */
    private $observaciones;

    /**
     * @var \Ambientes\CidmBundle\Entity\EstadoAccesoAmbientes
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\EstadoAccesoAmbientes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ESTADO", referencedColumnName="ID_ESTADO")
     * })
     */
    private $idEstado;

    /**
     * @var \Ambientes\CidmBundle\Entity\Evento
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Evento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_EVENTO", referencedColumnName="ID_EVENTO")
     * })
     */
    private $idEvento;



    /**
     * Get idAcceso
     *
     * @return integer 
     */
    public function getIdAcceso()
    {
        return $this->idAcceso;
    }

    /**
     * Set fechaCompleta
     *
     * @param \DateTime $fechaCompleta
     * @return AccesoAmbientes
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
     * Set observaciones
     *
     * @param string $observaciones
     * @return AccesoAmbientes
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set idEstado
     *
     * @param \Ambientes\CidmBundle\Entity\EstadoAccesoAmbientes $idEstado
     * @return AccesoAmbientes
     */
    public function setIdEstado(\Ambientes\CidmBundle\Entity\EstadoAccesoAmbientes $idEstado = null)
    {
        $this->idEstado = $idEstado;

        return $this;
    }

    /**
     * Get idEstado
     *
     * @return \Ambientes\CidmBundle\Entity\EstadoAccesoAmbientes 
     */
    public function getIdEstado()
    {
        return $this->idEstado;
    }

    /**
     * Set idEvento
     *
     * @param \Ambientes\CidmBundle\Entity\Evento $idEvento
     * @return AccesoAmbientes
     */
    public function setIdEvento(\Ambientes\CidmBundle\Entity\Evento $idEvento = null)
    {
        $this->idEvento = $idEvento;

        return $this;
    }

    /**
     * Get idEvento
     *
     * @return \Ambientes\CidmBundle\Entity\Evento 
     */
    public function getIdEvento()
    {
        return $this->idEvento;
    }
}
