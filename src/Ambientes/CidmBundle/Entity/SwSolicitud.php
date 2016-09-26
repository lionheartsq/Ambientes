<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SwSolicitud
 *
 * @ORM\Table(name="sw_solicitud", indexes={@ORM\Index(name="FK_RELATIONSHIP_6", columns={"ID_SOLICITUD"}), @ORM\Index(name="FK_RELATIONSHIP_7", columns={"ID_SOFTWARE"})})
 * @ORM\Entity
 */
class SwSolicitud
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
     * @var \Ambientes\CidmBundle\Entity\Solicitud
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Solicitud")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_SOLICITUD", referencedColumnName="ID_SOLICITUD")
     * })
     */
    private $idSolicitud;

    /**
     * @var \Ambientes\CidmBundle\Entity\Software
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Software")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_SOFTWARE", referencedColumnName="ID_SOFTWARE")
     * })
     */
    private $idSoftware;



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
     * Set idSolicitud
     *
     * @param \Ambientes\CidmBundle\Entity\Solicitud $idSolicitud
     * @return SwSolicitud
     */
    public function setIdSolicitud(\Ambientes\CidmBundle\Entity\Solicitud $idSolicitud = null)
    {
        $this->idSolicitud = $idSolicitud;

        return $this;
    }

    /**
     * Get idSolicitud
     *
     * @return \Ambientes\CidmBundle\Entity\Solicitud 
     */
    public function getIdSolicitud()
    {
        return $this->idSolicitud;
    }

    /**
     * Set idSoftware
     *
     * @param \Ambientes\CidmBundle\Entity\Software $idSoftware
     * @return SwSolicitud
     */
    public function setIdSoftware(\Ambientes\CidmBundle\Entity\Software $idSoftware = null)
    {
        $this->idSoftware = $idSoftware;

        return $this;
    }

    /**
     * Get idSoftware
     *
     * @return \Ambientes\CidmBundle\Entity\Software 
     */
    public function getIdSoftware()
    {
        return $this->idSoftware;
    }
}
