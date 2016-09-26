<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ElementoIngreso
 *
 * @ORM\Table(name="elemento_ingreso", indexes={@ORM\Index(name="FK_RELATIONSHIP_28", columns={"ID_ELEMENTO"}), @ORM\Index(name="FK_RELATIONSHIP_29", columns={"ID_INGRESO"})})
 * @ORM\Entity
 */
class ElementoIngreso
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
     * @ORM\Column(name="COD_BARRAS", type="string", length=250, nullable=true)
     */
    private $codBarras;

    /**
     * @var string
     *
     * @ORM\Column(name="ESTADO", type="string", length=250, nullable=true)
     */
    private $estado;

    /**
     * @var \Ambientes\CidmBundle\Entity\Elemento
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Elemento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ELEMENTO", referencedColumnName="ID_ELEMENTO")
     * })
     */
    private $idElemento;

    /**
     * @var \Ambientes\CidmBundle\Entity\Ingreso
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Ingreso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_INGRESO", referencedColumnName="ID_INGRESO")
     * })
     */
    private $idIngreso;



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
     * Set codBarras
     *
     * @param string $codBarras
     * @return ElementoIngreso
     */
    public function setCodBarras($codBarras)
    {
        $this->codBarras = $codBarras;

        return $this;
    }

    /**
     * Get codBarras
     *
     * @return string 
     */
    public function getCodBarras()
    {
        return $this->codBarras;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return ElementoIngreso
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
     * Set idElemento
     *
     * @param \Ambientes\CidmBundle\Entity\Elemento $idElemento
     * @return ElementoIngreso
     */
    public function setIdElemento(\Ambientes\CidmBundle\Entity\Elemento $idElemento = null)
    {
        $this->idElemento = $idElemento;

        return $this;
    }

    /**
     * Get idElemento
     *
     * @return \Ambientes\CidmBundle\Entity\Elemento 
     */
    public function getIdElemento()
    {
        return $this->idElemento;
    }

    /**
     * Set idIngreso
     *
     * @param \Ambientes\CidmBundle\Entity\Ingreso $idIngreso
     * @return ElementoIngreso
     */
    public function setIdIngreso(\Ambientes\CidmBundle\Entity\Ingreso $idIngreso = null)
    {
        $this->idIngreso = $idIngreso;

        return $this;
    }

    /**
     * Get idIngreso
     *
     * @return \Ambientes\CidmBundle\Entity\Ingreso 
     */
    public function getIdIngreso()
    {
        return $this->idIngreso;
    }
}
