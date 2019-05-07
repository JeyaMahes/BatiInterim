<?php

namespace JmBatiInterimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chefchantier
 *
 * @ORM\Table(name="ChefChantier", indexes={@ORM\Index(name="FK_ChefChantier_Entrepreneur", columns={"idEntrepreneur"})})
 * @ORM\Entity(repositoryClass="JmBatiInterimBundle\Repository\ChefchantierRepository")
 */
class Chefchantier
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
     * @ORM\Column(name="nomChefChantier", type="string", length=128, nullable=true)
     */
    private $nomchefchantier;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomChefChantier", type="string", length=128, nullable=true)
     */
    private $prenomchefchantier;

    /**
     * @var \Entrepreneur
     *
     * @ORM\ManyToOne(targetEntity="Entrepreneur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEntrepreneur", referencedColumnName="id")
     * })
     */
    private $identrepreneur;



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
     * Set nomchefchantier
     *
     * @param string $nomchefchantier
     *
     * @return Chefchantier
     */
    public function setNomchefchantier($nomchefchantier)
    {
        $this->nomchefchantier = $nomchefchantier;

        return $this;
    }

    /**
     * Get nomchefchantier
     *
     * @return string
     */
    public function getNomchefchantier()
    {
        return $this->nomchefchantier;
    }

    /**
     * Set prenomchefchantier
     *
     * @param string $prenomchefchantier
     *
     * @return Chefchantier
     */
    public function setPrenomchefchantier($prenomchefchantier)
    {
        $this->prenomchefchantier = $prenomchefchantier;

        return $this;
    }

    /**
     * Get prenomchefchantier
     *
     * @return string
     */
    public function getPrenomchefchantier()
    {
        return $this->prenomchefchantier;
    }

    /**
     * Set identrepreneur
     *
     * @param \JmBatiInterimBundle\Entity\Entrepreneur $identrepreneur
     *
     * @return Chefchantier
     */
    public function setIdentrepreneur(\JmBatiInterimBundle\Entity\Entrepreneur $identrepreneur = null)
    {
        $this->identrepreneur = $identrepreneur;

        return $this;
    }

    /**
     * Get identrepreneur
     *
     * @return \JmBatiInterimBundle\Entity\Entrepreneur
     */
    public function getIdentrepreneur()
    {
        return $this->identrepreneur;
    }
}
