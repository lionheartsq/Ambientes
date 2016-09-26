<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Solicitud
 *
 * @ORM\Table(name="solicitud", indexes={@ORM\Index(name="FK_RELATIONSHIP_3", columns={"ID_AMBIENTE"})})
 * @ORM\Entity
 */
class Solicitud
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_SOLICITUD", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSolicitud;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_SOLICITUD", type="date", nullable=true)
     */
    private $fechaSolicitud;

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
     * @var string
     *
     * @ORM\Column(name="ESTADO", type="string", length=250, nullable=true)
     */
    private $estado;

    /**
     * @var integer
     *
     * @ORM\Column(name="NUMERO_PERSONAS", type="integer", nullable=true)
     */
    private $numeroPersonas;

    /**
     * @var \Ambientes\CidmBundle\Entity\Ambiente
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Ambiente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_AMBIENTE", referencedColumnName="ID_AMBIENTE")
     * })
     */
    private $idAmbiente;


    /**
     * @var integer
     *
     * @ORM\Column(name="ID_USUARIO", type="integer")
     */
    private $idUsuario;
    private $app;

    /**
     * Get idSolicitud
     *
     * @return integer 
     */
    public function getIdSolicitud()
    {
        return $this->idSolicitud;
    }

    public function __toString() {
          return $this->idSolicitud;
          return (string) $this->idSolicitud;
       }    
    /**    
    
    /**
     * Set idUsuario
     *
     * @param integer $idUsuario
     * @return Solicitud
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set fechaSolicitud
     *
     * @param \DateTime $fechaSolicitud
     * @return Solicitud
     */
    public function setFechaSolicitud($fechaSolicitud)
    {
        $this->fechaSolicitud = $fechaSolicitud;

        return $this;
    }

    /**
     * Get fechaSolicitud
     *
     * @return \DateTime 
     */
    public function getFechaSolicitud()
    {
        return $this->fechaSolicitud;
    }

    /**
     * Set fechaRespuesta
     *
     * @param \DateTime $fechaRespuesta
     * @return Solicitud
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
     * @return Solicitud
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
     * @return Solicitud
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
     * @return Solicitud
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
     * @return Solicitud
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
     * Set estado
     *
     * @param string $estado
     * @return Solicitud
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
     * Set numeroPersonas
     *
     * @param integer $numeroPersonas
     * @return Solicitud
     */
    public function setNumeroPersonas($numeroPersonas)
    {
        $this->numeroPersonas = $numeroPersonas;

        return $this;
    }

    /**
     * Get numeroPersonas
     *
     * @return integer 
     */
    public function getNumeroPersonas()
    {
        return $this->numeroPersonas;
    }

    /**
     * Set idAmbiente
     *
     * @param \Ambientes\CidmBundle\Entity\Ambiente $idAmbiente
     * @return Solicitud
     */
    public function setIdAmbiente(\Ambientes\CidmBundle\Entity\Ambiente $idAmbiente = null)
    {
        $this->idAmbiente = $idAmbiente;

        return $this;
    }

    /**
     * Get idAmbiente
     *
     * @return \Ambientes\CidmBundle\Entity\Ambiente 
     */
    public function getIdAmbiente()
    {
        return $this->idAmbiente;
    }
}
