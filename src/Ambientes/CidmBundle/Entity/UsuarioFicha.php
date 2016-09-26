<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioFicha
 *
 * @ORM\Table(name="usuario_ficha", indexes={@ORM\Index(name="FK_RELATIONSHIP_14", columns={"ID_USUARIO"}), @ORM\Index(name="FK_RELATIONSHIP_15", columns={"ID_FICHA"})})
 * @ORM\Entity
 */
class UsuarioFicha
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
     * @var \Ambientes\CidmBundle\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_USUARIO", referencedColumnName="ID_USUARIO")
     * })
     */
    private $idUsuario;

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
     * Set idUsuario
     *
     * @param \Ambientes\CidmBundle\Entity\Usuario $idUsuario
     * @return UsuarioFicha
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
     * Set idFicha
     *
     * @param \Ambientes\CidmBundle\Entity\Ficha $idFicha
     * @return UsuarioFicha
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
