<?php

namespace JmBatiInterimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chantier
 *
 * @ORM\Table(name="Chantier", indexes={@ORM\Index(name="FK_Chantier_ChefChantier", columns={"idChefChantier"})})
 * @ORM\Entity(repositoryClass="JmBatiInterimBundle\Repository\ChantierRepository")
 */
class Chantier
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
     * @var string
     *
     * @ORM\Column(name="libelleChantier", type="string", length=128, nullable=true)
     */
    private $libellechantier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebutChantier", type="date", nullable=false)
     */
    private $datedebutchantier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinChantier", type="date", nullable=false)
     */
    private $datefinchantier;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseChantier", type="string", length=128, nullable=true)
     */
    private $adressechantier;

    /**
     * @var string
     *
     * @ORM\Column(name="cpChantier", type="string", length=5, nullable=true)
     */
    private $cpchantier;

    /**
     * @var string
     *
     * @ORM\Column(name="villeChantier", type="string", length=128, nullable=true)
     */
    private $villechantier;

    /**
     * @var \Chefchantier
     *
     * @ORM\ManyToOne(targetEntity="Chefchantier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idChefChantier", referencedColumnName="id")
     * })
     */
    private $idchefchantier;



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
     * Set libellechantier
     *
     * @param string $libellechantier
     *
     * @return Chantier
     */
    public function setLibellechantier($libellechantier)
    {
        $this->libellechantier = $libellechantier;

        return $this;
    }

    /**
     * Get libellechantier
     *
     * @return string
     */
    public function getLibellechantier()
    {
        return $this->libellechantier;
    }

    /**
     * Set datedebutchantier
     *
     * @param \DateTime $datedebutchantier
     *
     * @return Chantier
     */
    public function setDatedebutchantier($datedebutchantier)
    {
        $this->datedebutchantier = $datedebutchantier;

        return $this;
    }

    /**
     * Get datedebutchantier
     *
     * @return \DateTime
     */
    public function getDatedebutchantier()
    {
        return $this->datedebutchantier;
    }

    /**
     * Set datefinchantier
     *
     * @param \DateTime $datefinchantier
     *
     * @return Chantier
     */
    public function setDatefinchantier($datefinchantier)
    {
        $this->datefinchantier = $datefinchantier;

        return $this;
    }

    /**
     * Get datefinchantier
     *
     * @return \DateTime
     */
    public function getDatefinchantier()
    {
        return $this->datefinchantier;
    }

    /**
     * Set adressechantier
     *
     * @param string $adressechantier
     *
     * @return Chantier
     */
    public function setAdressechantier($adressechantier)
    {
        $this->adressechantier = $adressechantier;

        return $this;
    }

    /**
     * Get adressechantier
     *
     * @return string
     */
    public function getAdressechantier()
    {
        return $this->adressechantier;
    }

    /**
     * Set cpchantier
     *
     * @param string $cpchantier
     *
     * @return Chantier
     */
    public function setCpchantier($cpchantier)
    {
        $this->cpchantier = $cpchantier;

        return $this;
    }

    /**
     * Get cpchantier
     *
     * @return string
     */
    public function getCpchantier()
    {
        return $this->cpchantier;
    }

    /**
     * Set villechantier
     *
     * @param string $villechantier
     *
     * @return Chantier
     */
    public function setVillechantier($villechantier)
    {
        $this->villechantier = $villechantier;

        return $this;
    }

    /**
     * Get villechantier
     *
     * @return string
     */
    public function getVillechantier()
    {
        return $this->villechantier;
    }

    /**
     * Set idchefchantier
     *
     * @param \JmBatiInterimBundle\Entity\Chefchantier $idchefchantier
     *
     * @return Chantier
     */
    public function setIdchefchantier(\JmBatiInterimBundle\Entity\Chefchantier $idchefchantier = null)
    {
        $this->idchefchantier = $idchefchantier;

        return $this;
    }

    /**
     * Get idchefchantier
     *
     * @return \JmBatiInterimBundle\Entity\Chefchantier
     */
    public function getIdchefchantier()
    {
        return $this->idchefchantier;
    }
}
