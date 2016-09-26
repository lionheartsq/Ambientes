<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Elemento
 *
 * @ORM\Table(name="elemento", indexes={@ORM\Index(name="FK_RELATIONSHIP_24", columns={"ID_USUARIO"}), @ORM\Index(name="FK_RELATIONSHIP_25", columns={"ID_TIPO_ELEMENTO"})})
 * @ORM\Entity
 */
class Elemento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_ELEMENTO", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idElemento;

    /**
     * @var string
     *
     * @ORM\Column(name="MARCA", type="string", length=250, nullable=true)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="SERIAL", type="string", length=500, nullable=true)
     */
    private $serial;

    /**
     * @var string
     *
     * @ORM\Column(name="OBSERVACIONES", type="string", length=500, nullable=true)
     */
    private $observaciones;

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
     * @var \Ambientes\CidmBundle\Entity\TipoElemento
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\TipoElemento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TIPO_ELEMENTO", referencedColumnName="ID_TIPO_ELEMENTO")
     * })
     */
    private $idTipoElemento;



    /**
     * Get idElemento
     *
     * @return integer 
     */
    public function getIdElemento()
    {
        return $this->idElemento;
    }

    /**
     * Set marca
     *
     * @param string $marca
     * @return Elemento
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set serial
     *
     * @param string $serial
     * @return Elemento
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;

        return $this;
    }

    /**
     * Get serial
     *
     * @return string 
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return Elemento
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
     * Set idUsuario
     *
     * @param \Ambientes\CidmBundle\Entity\Usuario $idUsuario
     * @return Elemento
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
     * Set idTipoElemento
     *
     * @param \Ambientes\CidmBundle\Entity\TipoElemento $idTipoElemento
     * @return Elemento
     */
    public function setIdTipoElemento(\Ambientes\CidmBundle\Entity\TipoElemento $idTipoElemento = null)
    {
        $this->idTipoElemento = $idTipoElemento;

        return $this;
    }

    /**
     * Get idTipoElemento
     *
     * @return \Ambientes\CidmBundle\Entity\TipoElemento 
     */
    public function getIdTipoElemento()
    {
        return $this->idTipoElemento;
    }
}
