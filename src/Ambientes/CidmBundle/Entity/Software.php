<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Software
 *
 * @ORM\Table(name="software")
 * @ORM\Entity
 */
class Software
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_SOFTWARE", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSoftware;

    /**
     * @var string
     *
     * @ORM\Column(name="CATEGORIA", type="string", length=250, nullable=true)
     */
    private $categoria;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMBRE", type="string", length=250, nullable=true)
     */
    private $nombre;



    /**
     * Get idSoftware
     *
     * @return integer 
     */
    public function getIdSoftware()
    {
        return $this->idSoftware;
    }

    /**
     * Set categoria
     *
     * @param string $categoria
     * @return Software
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Software
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
