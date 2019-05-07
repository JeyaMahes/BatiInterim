<?php

namespace JmBatiInterimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conge
 *
 * @ORM\Table(name="Conge", indexes={@ORM\Index(name="FK_Conge_Artisan", columns={"idArtisan"})})
 * @ORM\Entity
 */
class Conge
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebutConge", type="date", nullable=true)
     */
    private $datedebutconge;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinConge", type="date", nullable=true)
     */
    private $datefinconge;

    /**
     * @var string
     *
     * @ORM\Column(name="etatConge", type="string", length=128, nullable=true)
     */
    private $etatconge;

    /**
     * @var \Artisan
     *
     * @ORM\ManyToOne(targetEntity="Artisan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idArtisan", referencedColumnName="id")
     * })
     */
    private $idartisan;



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
     * Set datedebutconge
     *
     * @param \DateTime $datedebutconge
     *
     * @return Conge
     */
    public function setDatedebutconge($datedebutconge)
    {
        $this->datedebutconge = $datedebutconge;

        return $this;
    }

    /**
     * Get datedebutconge
     *
     * @return \DateTime
     */
    public function getDatedebutconge()
    {
        return $this->datedebutconge;
    }

    /**
     * Set datefinconge
     *
     * @param \DateTime $datefinconge
     *
     * @return Conge
     */
    public function setDatefinconge($datefinconge)
    {
        $this->datefinconge = $datefinconge;

        return $this;
    }

    /**
     * Get datefinconge
     *
     * @return \DateTime
     */
    public function getDatefinconge()
    {
        return $this->datefinconge;
    }

    /**
     * Set etatconge
     *
     * @param string $etatconge
     *
     * @return Conge
     */
    public function setEtatconge($etatconge)
    {
        $this->etatconge = $etatconge;

        return $this;
    }

    /**
     * Get etatconge
     *
     * @return string
     */
    public function getEtatconge()
    {
        return $this->etatconge;
    }

    /**
     * Set idartisan
     *
     * @param \JmBatiInterimBundle\Entity\Artisan $idartisan
     *
     * @return Conge
     */
    public function setIdartisan(\JmBatiInterimBundle\Entity\Artisan $idartisan = null)
    {
        $this->idartisan = $idartisan;

        return $this;
    }

    /**
     * Get idartisan
     *
     * @return \JmBatiInterimBundle\Entity\Artisan
     */
    public function getIdartisan()
    {
        return $this->idartisan;
    }
}
