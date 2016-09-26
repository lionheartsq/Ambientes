<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evento
 *
 * @ORM\Table(name="evento", indexes={@ORM\Index(name="FK_RELATIONSHIP_16", columns={"ID_FICHA"}), @ORM\Index(name="FK_RELATIONSHIP_17", columns={"ID_USUARIO"}), @ORM\Index(name="FK_RELATIONSHIP_18", columns={"ID_AMBIENTE"})})
 * @ORM\Entity
 */
class Evento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_EVENTO", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvento;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPCION", type="string", length=500, nullable=true)
     */
    private $descripcion;

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
     * @var \Ambientes\CidmBundle\Entity\Ficha
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Ficha")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_FICHA", referencedColumnName="ID_FICHA")
     * })
     */
    private $idFicha;

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
     * @var \Ambientes\CidmBundle\Entity\Ambiente
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Ambiente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_AMBIENTE", referencedColumnName="ID_AMBIENTE")
     * })
     */
    private $idAmbiente;



    /**
     * Get idEvento
     *
     * @return integer 
     */
    public function getIdEvento()
    {
        return $this->idEvento;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Evento
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
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Evento
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
     * @return Evento
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
     * Set idFicha
     *
     * @param \Ambientes\CidmBundle\Entity\Ficha $idFicha
     * @return Evento
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

    /**
     * Set idUsuario
     *
     * @param \Ambientes\CidmBundle\Entity\Usuario $idUsuario
     * @return Evento
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

    /**
     * Set idAmbiente
     *
     * @param \Ambientes\CidmBundle\Entity\Ambiente $idAmbiente
     * @return Evento
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
