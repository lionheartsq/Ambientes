<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ficha
 *
 * @ORM\Table(name="ficha", indexes={@ORM\Index(name="FK_RELATIONSHIP_10", columns={"ID_NIVEL"})})
 * @ORM\Entity
 */
class Ficha
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_FICHA", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFicha;

    /**
     * @var integer
     *
     * @ORM\Column(name="CODIGO", type="integer", nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="PROGRAMA", type="string", length=250, nullable=true)
     */
    private $programa;

    /**
     * @var string
     *
     * @ORM\Column(name="INSTRUCTOR_LIDER", type="string", length=250, nullable=true)
     */
    private $instructorLider;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_INICIO_LECTIVA", type="date", nullable=true)
     */
    private $fechaInicioLectiva;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_FIN_LECTIVA", type="date", nullable=true)
     */
    private $fechaFinLectiva;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="FECHA_CIERRE_FICHA", type="date", nullable=true)
     */
    private $fechaCierreFicha;

    /**
     * @var \Ambientes\CidmBundle\Entity\NivelFormacion
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\NivelFormacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_NIVEL", referencedColumnName="ID_NIVEL")
     * })
     */
    private $idNivel;



    /**
     * Get idFicha
     *
     * @return integer 
     */
    public function getIdFicha()
    {
        return $this->idFicha;
    }
    
     public function __toString() {
          return $this->idFicha;
          return (string) $this->idFicha;
       }    
    /**
     * Set codigo
     *
     * @param integer $codigo
     * @return Ficha
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
     * Set programa
     *
     * @param string $programa
     * @return Ficha
     */
    public function setPrograma($programa)
    {
        $this->programa = $programa;

        return $this;
    }

    /**
     * Get programa
     *
     * @return string 
     */
    public function getPrograma()
    {
        return $this->programa;
    }

    /**
     * Set instructorLider
     *
     * @param integer $instructorLider
     * @return Ficha
     */
    public function setInstructorLider($instructorLider)
    {
        $this->instructorLider = $instructorLider;

        return $this;
    }

    /**
     * Get instructorLider
     *
     * @return integer 
     */
    public function getInstructorLider()
    {
        return $this->instructorLider;
    }

    /**
     * Set fechaInicioLectiva
     *
     * @param \DateTime $fechaInicioLectiva
     * @return Ficha
     */
    public function setFechaInicioLectiva($fechaInicioLectiva)
    {
        $this->fechaInicioLectiva = $fechaInicioLectiva;

        return $this;
    }

    /**
     * Get fechaInicioLectiva
     *
     * @return \DateTime 
     */
    public function getFechaInicioLectiva()
    {
        return $this->fechaInicioLectiva;
    }

    /**
     * Set fechaFinLectiva
     *
     * @param \DateTime $fechaFinLectiva
     * @return Ficha
     */
    public function setFechaFinLectiva($fechaFinLectiva)
    {
        $this->fechaFinLectiva = $fechaFinLectiva;

        return $this;
    }

    /**
     * Get fechaFinLectiva
     *
     * @return \DateTime 
     */
    public function getFechaFinLectiva()
    {
        return $this->fechaFinLectiva;
    }

    /**
     * Set fechaCierreFicha
     *
     * @param \DateTime $fechaCierreFicha
     * @return Ficha
     */
    public function setFechaCierreFicha($fechaCierreFicha)
    {
        $this->fechaCierreFicha = $fechaCierreFicha;

        return $this;
    }

    /**
     * Get fechaCierreFicha
     *
     * @return \DateTime 
     */
    public function getFechaCierreFicha()
    {
        return $this->fechaCierreFicha;
    }

    /**
     * Set idNivel
     *
     * @param \Ambientes\CidmBundle\Entity\NivelFormacion $idNivel
     * @return Ficha
     */
    public function setIdNivel(\Ambientes\CidmBundle\Entity\NivelFormacion $idNivel = null)
    {
        $this->idNivel = $idNivel;

        return $this;
    }

    /**
     * Get idNivel
     *
     * @return \Ambientes\CidmBundle\Entity\NivelFormacion 
     */
    public function getIdNivel()
    {
        return $this->idNivel;
    }
}
