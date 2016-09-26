<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Horario
 *
 * @ORM\Table(name="horario", indexes={@ORM\Index(name="FK_RELATIONSHIP_12", columns={"ID_JORNADA"}), @ORM\Index(name="FK_RELATIONSHIP_13", columns={"ID_FICHA"})})
 * @ORM\Entity
 */
class Horario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="DIA", type="string", length=250, nullable=true)
     */
    private $dia;

    /**
     * @var \Ambientes\CidmBundle\Entity\Jornada
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Jornada")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_JORNADA", referencedColumnName="ID_JORNADA")
     * })
     */
    private $idJornada;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dia
     *
     * @param string $dia
     * @return Horario
     */
    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }

    /**
     * Get dia
     *
     * @return string 
     */
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * Set idJornada
     *
     * @param \Ambientes\CidmBundle\Entity\Jornada $idJornada
     * @return Horario
     */
    public function setIdJornada(\Ambientes\CidmBundle\Entity\Jornada $idJornada = null)
    {
        $this->idJornada = $idJornada;

        return $this;
    }

    /**
     * Get idJornada
     *
     * @return \Ambientes\CidmBundle\Entity\Jornada 
     */
    public function getIdJornada()
    {
        return $this->idJornada;
    }

    /**
     * Set idFicha
     *
     * @param \Ambientes\CidmBundle\Entity\Ficha $idFicha
     * @return Horario
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
