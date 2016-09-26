<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notificaciones
 *
 * @ORM\Table(name="notificaciones", indexes={@ORM\Index(name="FK_RELATIONSHIP_22", columns={"ID_TIPO_NOTIFICACION"}), @ORM\Index(name="FK_RELATIONSHIP_23", columns={"ID_FICHA"})})
 * @ORM\Entity
 */
class Notificaciones
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_NOTIFICACION", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idNotificacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_USUARIO_GEN", type="integer", nullable=true)
     */
    private $idUsuarioGen;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_USUARIO_REEM", type="integer", nullable=true)
     */
    private $idUsuarioReem;

    /**
     * @var string
     *
     * @ORM\Column(name="ESTADO", type="string", length=250, nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPCION", type="string", length=500, nullable=true)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_NOTIFICACION", type="date", nullable=true)
     */
    private $fechaNotificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_RESPUESTA", type="date", nullable=true)
     */
    private $fechaRespuesta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_INICIO", type="date", nullable=true)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_FIN", type="date", nullable=true)
     */
    private $fechaFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HORA_INICIO", type="time", nullable=true)
     */
    private $horaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HORA_FIN", type="time", nullable=true)
     */
    private $horaFin;

    /**
     * @var \Ambientes\CidmBundle\Entity\TipoNotificacion
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\TipoNotificacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TIPO_NOTIFICACION", referencedColumnName="ID_TIPO_NOTIFICACION")
     * })
     */
    private $idTipoNotificacion;

    /**
     * @var \Ambientes\CidmBundle\Entity\Ficha
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Ficha")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_FICHA", referencedColumnName="ID_FICHA")
     * })
     */
    private $idFicha;



    /**
     * Get idNotificacion
     *
     * @return integer 
     */
    public function getIdNotificacion()
    {
        return $this->idNotificacion;
    }

    /**
     * Set idUsuarioGen
     *
     * @param integer $idUsuarioGen
     * @return Notificaciones
     */
    public function setIdUsuarioGen($idUsuarioGen)
    {
        $this->idUsuarioGen = $idUsuarioGen;

        return $this;
    }

    /**
     * Get idUsuarioGen
     *
     * @return integer 
     */
    public function getIdUsuarioGen()
    {
        return $this->idUsuarioGen;
    }

    /**
     * Set idUsuarioReem
     *
     * @param integer $idUsuarioReem
     * @return Notificaciones
     */
    public function setIdUsuarioReem($idUsuarioReem)
    {
        $this->idUsuarioReem = $idUsuarioReem;

        return $this;
    }

    /**
     * Get idUsuarioReem
     *
     * @return integer 
     */
    public function getIdUsuarioReem()
    {
        return $this->idUsuarioReem;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Notificaciones
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Notificaciones
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
     * Set fechaNotificacion
     *
     * @param \DateTime $fechaNotificacion
     * @return Notificaciones
     */
    public function setFechaNotificacion($fechaNotificacion)
    {
        $this->fechaNotificacion = $fechaNotificacion;

        return $this;
    }

    /**
     * Get fechaNotificacion
     *
     * @return \DateTime 
     */
    public function getFechaNotificacion()
    {
        return $this->fechaNotificacion;
    }

    /**
     * Set fechaRespuesta
     *
     * @param \DateTime $fechaRespuesta
     * @return Notificaciones
     */
    public function setFechaRespuesta($fechaRespuesta)
    {
        $this->fechaRespuesta = $fechaRespuesta;

        return $this;
    }

    /**
     * Get fechaRespuesta
     *
     * @return \DateTime 
     */
    public function getFechaRespuesta()
    {
        return $this->fechaRespuesta;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Notificaciones
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Notificaciones
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set horaInicio
     *
     * @param \DateTime $horaInicio
     * @return Notificaciones
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;

        return $this;
    }

    /**
     * Get horaInicio
     *
     * @return \DateTime 
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * Set horaFin
     *
     * @param \DateTime $horaFin
     * @return Notificaciones
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;

        return $this;
    }

    /**
     * Get horaFin
     *
     * @return \DateTime 
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * Set idTipoNotificacion
     *
     * @param \Ambientes\CidmBundle\Entity\TipoNotificacion $idTipoNotificacion
     * @return Notificaciones
     */
    public function setIdTipoNotificacion(\Ambientes\CidmBundle\Entity\TipoNotificacion $idTipoNotificacion = null)
    {
        $this->idTipoNotificacion = $idTipoNotificacion;

        return $this;
    }

    /**
     * Get idTipoNotificacion
     *
     * @return \Ambientes\CidmBundle\Entity\TipoNotificacion 
     */
    public function getIdTipoNotificacion()
    {
        return $this->idTipoNotificacion;
    }

    /**
     * Set idFicha
     *
     * @param \Ambientes\CidmBundle\Entity\Ficha $idFicha
     * @return Notificaciones
     */
    public function setIdFicha(\Ambientes\CidmBundle\Entity\Ficha $idFicha = null)
    {
        $this->idFicha = $idFicha;

        return $this;
    }

    /**
     * Get idFicha
     *
     * @return \Ambientes\CidmBundle\Entity\Ficha 
     */
    public function getIdFicha()
    {
        return $this->idFicha;
    }
}
