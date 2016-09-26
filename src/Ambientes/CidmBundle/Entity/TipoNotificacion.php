<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoNotificacion
 *
 * @ORM\Table(name="tipo_notificacion")
 * @ORM\Entity
 */
class TipoNotificacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_TIPO_NOTIFICACION", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipoNotificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE", type="string", length=250, nullable=true)
     */
    private $nombre;



    /**
     * Get idTipoNotificacion
     *
     * @return integer 
     */
    public function getIdTipoNotificacion()
    {
        return $this->idTipoNotificacion;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return TipoNotificacion
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
}
