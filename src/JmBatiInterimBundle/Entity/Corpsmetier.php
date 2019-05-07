<?php

namespace JmBatiInterimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Corpsmetier
 *
 * @ORM\Table(name="CorpsMetier", indexes={@ORM\Index(name="FK_CorpsMetier_Secteur", columns={"idSecteur"})})
 * @ORM\Entity
 */
class Corpsmetier
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
     * @ORM\Column(name="libelleCorpsMetier", type="string", length=128, nullable=true)
     */
    private $libellecorpsmetier;

    /**
     * @var \Secteur
     *
     * @ORM\ManyToOne(targetEntity="Secteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSecteur", referencedColumnName="id")
     * })
     */
    private $idsecteur;



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
     * Set libellecorpsmetier
     *
     * @param string $libellecorpsmetier
     *
     * @return Corpsmetier
     */
    public function setLibellecorpsmetier($libellecorpsmetier)
    {
        $this->libellecorpsmetier = $libellecorpsmetier;

        return $this;
    }

    /**
     * Get libellecorpsmetier
     *
     * @return string
     */
    public function getLibellecorpsmetier()
    {
        return $this->libellecorpsmetier;
    }

    /**
     * Set idsecteur
     *
     * @param \JmBatiInterimBundle\Entity\Secteur $idsecteur
     *
     * @return Corpsmetier
     */
    public function setIdsecteur(\JmBatiInterimBundle\Entity\Secteur $idsecteur = null)
    {
        $this->idsecteur = $idsecteur;

        return $this;
    }

    /**
     * Get idsecteur
     *
     * @return \JmBatiInterimBundle\Entity\Secteur
     */
    public function getIdsecteur()
    {
        return $this->idsecteur;
    }
}
