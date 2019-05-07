<?php

namespace JmBatiInterimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Secteur
 *
 * @ORM\Table(name="Secteur")
 * @ORM\Entity(repositoryClass="JmBatiInterimBundle\Repository\SecteurRepository")
 */
class Secteur
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
     * @ORM\Column(name="libelleSecteur", type="string", length=128, nullable=true)
     */
    private $libellesecteur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Entrepreneur", inversedBy="idsecteur")
     * @ORM\JoinTable(name="travailler",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idSecteur", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idEntrepreneur", referencedColumnName="id")
     *   }
     * )
     */
    private $identrepreneur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->identrepreneur = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Set libellesecteur
     *
     * @param string $libellesecteur
     *
     * @return Secteur
     */
    public function setLibellesecteur($libellesecteur)
    {
        $this->libellesecteur = $libellesecteur;

        return $this;
    }

    /**
     * Get libellesecteur
     *
     * @return string
     */
    public function getLibellesecteur()
    {
        return $this->libellesecteur;
    }

    /**
     * Add identrepreneur
     *
     * @param \JmBatiInterimBundle\Entity\Entrepreneur $identrepreneur
     *
     * @return Secteur
     */
    public function addIdentrepreneur(\JmBatiInterimBundle\Entity\Entrepreneur $identrepreneur)
    {
        $this->identrepreneur[] = $identrepreneur;

        return $this;
    }

    /**
     * Remove identrepreneur
     *
     * @param \JmBatiInterimBundle\Entity\Entrepreneur $identrepreneur
     */
    public function removeIdentrepreneur(\JmBatiInterimBundle\Entity\Entrepreneur $identrepreneur)
    {
        $this->identrepreneur->removeElement($identrepreneur);
    }

    /**
     * Get identrepreneur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdentrepreneur()
    {
        return $this->identrepreneur;
    }
}
