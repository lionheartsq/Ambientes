<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoUsuario
 *
 * @ORM\Table(name="estado_usuario")
 * @ORM\Entity
 */
class EstadoUsuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_ESTADO_USUARIO", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEstadoUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRIPCION", type="string", length=250, nullable=true)
     */
    private $descripcion;



    /**
     * Get idEstadoUsuario
     *
     * @return integer 
     */
    public function getIdEstadoUsuario()
    {
        return $this->idEstadoUsuario;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return EstadoUsuario
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
}
