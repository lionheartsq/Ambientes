<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CalendarioEvento
 *
 * @ORM\Table(name="calendario_evento", indexes={@ORM\Index(name="FK_RELATIONSHIP_21", columns={"ID_EVENTO"})})
 * @ORM\Entity
 */
class CalendarioEvento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_CALENDARIO", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCalendario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DIA", type="date", nullable=true)
     */
    private $dia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HORA", type="time", nullable=true)
     */
    private $hora;

    /**
     * @var string
     *
     * @ORM\Column(name="ESTADO", type="string", length=250, nullable=true)
     */
    private $estado;

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
     * Get idCalendario
     *
     * @return integer 
     */
    public function getIdCalendario()
    {
        return $this->idCalendario;
    }

    /**
     * Set dia
     *
     * @param \DateTime $dia
     * @return CalendarioEvento
     */
    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }

    /**
     * Get dia
     *
     * @return \DateTime 
     */
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     * @return CalendarioEvento
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return CalendarioEvento
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
     * Set idEvento
     *
     * @param \Ambientes\CidmBundle\Entity\Evento $idEvento
     * @return CalendarioEvento
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
