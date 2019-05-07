<?php

namespace JmBatiInterimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entrepreneur
 *
 * @ORM\Table(name="Entrepreneur")
 * @ORM\Entity(repositoryClass="JmBatiInterimBundle\Repository\EntrepreneurRepository")
 */
class Entrepreneur
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
     * @ORM\Column(name="raisonSociale", type="string", length=128, nullable=true)
     */
    private $raisonsociale;

    /**
     * @var string
     *
     * @ORM\Column(name="nomResponsable", type="string", length=128, nullable=true)
     */
    private $nomresponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomResponsable", type="string", length=128, nullable=true)
     */
    private $prenomresponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="telResponsable", type="string", length=128, nullable=true)
     */
    private $telresponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="telephoneEntreprise", type="string", length=10, nullable=true)
     */
    private $telephoneentreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseEntreprise", type="string", length=128, nullable=true)
     */
    private $adresseentreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="cpEntreprise", type="string", length=5, nullable=true)
     */
    private $cpentreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="villeEntreprise", type="string", length=128, nullable=true)
     */
    private $villeentreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="loginEntreprise", type="string", length=10, nullable=true)
     */
    private $loginentreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="mdpEntreprise", type="string", length=512, nullable=true)
     */
    private $mdpentreprise;

    /**
     * @var boolean
     *
     * @ORM\Column(name="premiereConnexion", type="boolean", nullable=false)
     */
    private $premiereconnexion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Secteur", mappedBy="identrepreneur")
     */
    private $idsecteur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idsecteur = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set raisonsociale
     *
     * @param string $raisonsociale
     *
     * @return Entrepreneur
     */
    public function setRaisonsociale($raisonsociale)
    {
        $this->raisonsociale = $raisonsociale;

        return $this;
    }

    /**
     * Get raisonsociale
     *
     * @return string
     */
    public function getRaisonsociale()
    {
        return $this->raisonsociale;
    }

    /**
     * Set nomresponsable
     *
     * @param string $nomresponsable
     *
     * @return Entrepreneur
     */
    public function setNomresponsable($nomresponsable)
    {
        $this->nomresponsable = $nomresponsable;

        return $this;
    }

    /**
     * Get nomresponsable
     *
     * @return string
     */
    public function getNomresponsable()
    {
        return $this->nomresponsable;
    }

    /**
     * Set prenomresponsable
     *
     * @param string $prenomresponsable
     *
     * @return Entrepreneur
     */
    public function setPrenomresponsable($prenomresponsable)
    {
        $this->prenomresponsable = $prenomresponsable;

        return $this;
    }

    /**
     * Get prenomresponsable
     *
     * @return string
     */
    public function getPrenomresponsable()
    {
        return $this->prenomresponsable;
    }

    /**
     * Set telresponsable
     *
     * @param string $telresponsable
     *
     * @return Entrepreneur
     */
    public function setTelresponsable($telresponsable)
    {
        $this->telresponsable = $telresponsable;

        return $this;
    }

    /**
     * Get telresponsable
     *
     * @return string
     */
    public function getTelresponsable()
    {
        return $this->telresponsable;
    }

    /**
     * Set telephoneentreprise
     *
     * @param string $telephoneentreprise
     *
     * @return Entrepreneur
     */
    public function setTelephoneentreprise($telephoneentreprise)
    {
        $this->telephoneentreprise = $telephoneentreprise;

        return $this;
    }

    /**
     * Get telephoneentreprise
     *
     * @return string
     */
    public function getTelephoneentreprise()
    {
        return $this->telephoneentreprise;
    }

    /**
     * Set adresseentreprise
     *
     * @param string $adresseentreprise
     *
     * @return Entrepreneur
     */
    public function setAdresseentreprise($adresseentreprise)
    {
        $this->adresseentreprise = $adresseentreprise;

        return $this;
    }

    /**
     * Get adresseentreprise
     *
     * @return string
     */
    public function getAdresseentreprise()
    {
        return $this->adresseentreprise;
    }

    /**
     * Set cpentreprise
     *
     * @param string $cpentreprise
     *
     * @return Entrepreneur
     */
    public function setCpentreprise($cpentreprise)
    {
        $this->cpentreprise = $cpentreprise;

        return $this;
    }

    /**
     * Get cpentreprise
     *
     * @return string
     */
    public function getCpentreprise()
    {
        return $this->cpentreprise;
    }

    /**
     * Set villeentreprise
     *
     * @param string $villeentreprise
     *
     * @return Entrepreneur
     */
    public function setVilleentreprise($villeentreprise)
    {
        $this->villeentreprise = $villeentreprise;

        return $this;
    }

    /**
     * Get villeentreprise
     *
     * @return string
     */
    public function getVilleentreprise()
    {
        return $this->villeentreprise;
    }

    /**
     * Set loginentreprise
     *
     * @param string $loginentreprise
     *
     * @return Entrepreneur
     */
    public function setLoginentreprise($loginentreprise)
    {
        $this->loginentreprise = $loginentreprise;

        return $this;
    }

    /**
     * Get loginentreprise
     *
     * @return string
     */
    public function getLoginentreprise()
    {
        return $this->loginentreprise;
    }

    /**
     * Set mdpentreprise
     *
     * @param string $mdpentreprise
     *
     * @return Entrepreneur
     */
    public function setMdpentreprise($mdpentreprise)
    {
        $this->mdpentreprise = $mdpentreprise;

        return $this;
    }

    /**
     * Get mdpentreprise
     *
     * @return string
     */
    public function getMdpentreprise()
    {
        return $this->mdpentreprise;
    }

    /**
     * Set premiereconnexion
     *
     * @param boolean $premiereconnexion
     *
     * @return Entrepreneur
     */
    public function setPremiereconnexion($premiereconnexion)
    {
        $this->premiereconnexion = $premiereconnexion;

        return $this;
    }

    /**
     * Get premiereconnexion
     *
     * @return boolean
     */
    public function getPremiereconnexion()
    {
        return $this->premiereconnexion;
    }

    /**
     * Add idsecteur
     *
     * @param \JmBatiInterimBundle\Entity\Secteur $idsecteur
     *
     * @return Entrepreneur
     */
    public function addIdsecteur(\JmBatiInterimBundle\Entity\Secteur $idsecteur)
    {
        $this->idsecteur[] = $idsecteur;

        return $this;
    }

    /**
     * Remove idsecteur
     *
     * @param \JmBatiInterimBundle\Entity\Secteur $idsecteur
     */
    public function removeIdsecteur(\JmBatiInterimBundle\Entity\Secteur $idsecteur)
    {
        $this->idsecteur->removeElement($idsecteur);
    }

    /**
     * Get idsecteur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdsecteur()
    {
        return $this->idsecteur;
    }
}
