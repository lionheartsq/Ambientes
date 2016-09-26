<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="FK_RELATIONSHIP_8", columns={"ID_ESTADO_USUARIO"}), @ORM\Index(name="FK_RELATIONSHIP_9", columns={"ID_TIPO_USUARIO"})})
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_USUARIO", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUsuario;

    /**
     * @var integer
     *
     * @ORM\Column(name="CEDULA", type="integer", nullable=false)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE", type="string", length=250, nullable=true)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="TELEFONO", type="integer", nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="TAG", type="string", length=250, nullable=true)
     */
    private $tag;

    /**
     * @var string
     *
     * @ORM\Column(name="EMAIL", type="string", length=250, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="FOTO", type="string", length=250, nullable=true)
     */
    private $foto;

    /**
     * @var \Ambientes\CidmBundle\Entity\EstadoUsuario
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\EstadoUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_ESTADO_USUARIO", referencedColumnName="ID_ESTADO_USUARIO")
     * })
     */
    private $idEstadoUsuario;

    /**
     * @var \Ambientes\CidmBundle\Entity\TipoUsuario
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\TipoUsuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_TIPO_USUARIO", referencedColumnName="ID_TIPO_USUARIO")
     * })
     */
    private $idTipoUsuario;



    /**
     * Get idUsuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function __toString() {
          return $this->idUsuario;
          return (string) $this->idUsuario;
       }    
    /**
     * Set cedula
     *
     * @param integer $cedula
     * @return Usuario
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;

        return $this;
    }

    /**
     * Get cedula
     *
     * @return integer 
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     * @return Usuario
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set tag
     *
     * @param string $tag
     * @return Usuario
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
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return Usuario
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set idEstadoUsuario
     *
     * @param \Ambientes\CidmBundle\Entity\EstadoUsuario $idEstadoUsuario
     * @return Usuario
     */
    public function setIdEstadoUsuario(\Ambientes\CidmBundle\Entity\EstadoUsuario $idEstadoUsuario = null)
    {
        $this->idEstadoUsuario = $idEstadoUsuario;

        return $this;
    }

    /**
     * Get idEstadoUsuario
     *
     * @return \Ambientes\CidmBundle\Entity\EstadoUsuario 
     */
    public function getIdEstadoUsuario()
    {
        return $this->idEstadoUsuario;
    }

    /**
     * Set idTipoUsuario
     *
     * @param \Ambientes\CidmBundle\Entity\TipoUsuario $idTipoUsuario
     * @return Usuario
     */
    public function setIdTipoUsuario(\Ambientes\CidmBundle\Entity\TipoUsuario $idTipoUsuario = null)
    {
        $this->idTipoUsuario = $idTipoUsuario;

        return $this;
    }

    /**
     * Get idTipoUsuario
     *
     * @return \Ambientes\CidmBundle\Entity\TipoUsuario 
     */
    public function getIdTipoUsuario()
    {
        return $this->idTipoUsuario;
    }
}
