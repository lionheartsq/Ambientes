<?php

namespace Ambientes\CidmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SwAmbiente
 *
 * @ORM\Table(name="sw_ambiente", indexes={@ORM\Index(name="FK_RELATIONSHIP_4", columns={"ID_SOFTWARE"}), @ORM\Index(name="FK_RELATIONSHIP_5", columns={"ID_AMBIENTE"})})
 * @ORM\Entity
 */
class SwAmbiente
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
     * @var \Ambientes\CidmBundle\Entity\Software
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Software")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_SOFTWARE", referencedColumnName="ID_SOFTWARE")
     * })
     */
    private $idSoftware;

    /**
     * @var \Ambientes\CidmBundle\Entity\Ambiente
     *
     * @ORM\ManyToOne(targetEntity="Ambientes\CidmBundle\Entity\Ambiente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_AMBIENTE", referencedColumnName="ID_AMBIENTE")
     * })
     */
    private $idAmbiente;



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
     * Set idSoftware
     *
     * @param \Ambientes\CidmBundle\Entity\Software $idSoftware
     * @return SwAmbiente
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

    /**
     * Set idAmbiente
     *
     * @param \Ambientes\CidmBundle\Entity\Ambiente $idAmbiente
     * @return SwAmbiente
     */
    public function setIdAmbiente(\Ambientes\CidmBundle\Entity\Ambiente $idAmbiente = null)
    {
        $this->idAmbiente = $idAmbiente;

        return $this;
    }

    /**
     * Get idAmbiente
     *
     * @return \Ambientes\CidmBundle\Entity\Ambiente 
     */
    public function getIdAmbiente()
    {
        return $this->idAmbiente;
    }
}
