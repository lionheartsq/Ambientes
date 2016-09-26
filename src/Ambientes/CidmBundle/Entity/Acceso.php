<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acceso
 *
 * @ORM\Table(name="acceso", indexes={@ORM\Index(name="FK_RELATIONSHIP_11", columns={"ID_USUARIO"})})
 * @ORM\Entity
 */
class Acceso
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
     * @var string
     *
     * @ORM\Column(name="CONTRASENA", type="string", length=32, nullable=true)
     */
    private $contrasena;

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
     * Get idAcceso
     *
     * @return integer 
     */
    public function getIdAcceso()
    {
        return $this->idAcceso;
    }

    /**
     * Set contrasena
     *
     * @param string $contrasena
     * @return Acceso
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * Get contrasena
     *
     * @return string 
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set idUsuario
     *
     * @param \Ambientes\CidmBundle\Entity\Usuario $idUsuario
     * @return Acceso
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
}
