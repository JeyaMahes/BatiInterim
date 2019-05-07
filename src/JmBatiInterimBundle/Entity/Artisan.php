<?php

namespace JmBatiInterimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artisan
 *
 * @ORM\Table(name="Artisan", indexes={@ORM\Index(name="FK_ARTISAN_METIER", columns={"idCorpsMetier"})})
 * @ORM\Entity(repositoryClass="JmBatiInterimBundle\Repository\ArtisanRepository")
 */
class Artisan
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
     * @ORM\Column(name="nomArtisan", type="string", length=128, nullable=true)
     */
    private $nomartisan;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomArtisan", type="string", length=128, nullable=true)
     */
    private $prenomartisan;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissanceArtisan", type="date", nullable=true)
     */
    private $datenaissanceartisan;

    /**
     * @var string
     *
     * @ORM\Column(name="villeNaissanceArtisan", type="string", length=128, nullable=true)
     */
    private $villenaissanceartisan;

    /**
     * @var string
     *
     * @ORM\Column(name="paysNaissanceArtisan", type="string", length=128, nullable=true)
     */
    private $paysnaissanceartisan;

    /**
     * @var string
     *
     * @ORM\Column(name="telephoneArtisan", type="string", length=10, nullable=true)
     */
    private $telephoneartisan;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseArtisan", type="string", length=128, nullable=true)
     */
    private $adresseartisan;

    /**
     * @var string
     *
     * @ORM\Column(name="cpArtisan", type="string", length=5, nullable=true)
     */
    private $cpartisan;

    /**
     * @var string
     *
     * @ORM\Column(name="villeArtisan", type="string", length=128, nullable=true)
     */
    private $villeartisan;

    /**
     * @var string
     *
     * @ORM\Column(name="loginArtisan", type="string", length=10, nullable=true)
     */
    private $loginartisan;

    /**
     * @var string
     *
     * @ORM\Column(name="mdpArtisan", type="string", length=512, nullable=true)
     */
    private $mdpartisan;

    /**
     * @var boolean
     *
     * @ORM\Column(name="premiereConnexion", type="boolean", nullable=false)
     */
    private $premiereconnexion;

    /**
     * @var \Corpsmetier
     *
     * @ORM\ManyToOne(targetEntity="Corpsmetier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCorpsMetier", referencedColumnName="id")
     * })
     */
    private $idcorpsmetier;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Mission", mappedBy="idartisan")
     */
    private $idmission;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idmission = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nomartisan
     *
     * @param string $nomartisan
     *
     * @return Artisan
     */
    public function setNomartisan($nomartisan)
    {
        $this->nomartisan = $nomartisan;

        return $this;
    }

    /**
     * Get nomartisan
     *
     * @return string
     */
    public function getNomartisan()
    {
        return $this->nomartisan;
    }

    /**
     * Set prenomartisan
     *
     * @param string $prenomartisan
     *
     * @return Artisan
     */
    public function setPrenomartisan($prenomartisan)
    {
        $this->prenomartisan = $prenomartisan;

        return $this;
    }

    /**
     * Get prenomartisan
     *
     * @return string
     */
    public function getPrenomartisan()
    {
        return $this->prenomartisan;
    }

    /**
     * Set datenaissanceartisan
     *
     * @param \DateTime $datenaissanceartisan
     *
     * @return Artisan
     */
    public function setDatenaissanceartisan($datenaissanceartisan)
    {
        $this->datenaissanceartisan = $datenaissanceartisan;

        return $this;
    }

    /**
     * Get datenaissanceartisan
     *
     * @return \DateTime
     */
    public function getDatenaissanceartisan()
    {
        return $this->datenaissanceartisan;
    }

    /**
     * Set villenaissanceartisan
     *
     * @param string $villenaissanceartisan
     *
     * @return Artisan
     */
    public function setVillenaissanceartisan($villenaissanceartisan)
    {
        $this->villenaissanceartisan = $villenaissanceartisan;

        return $this;
    }

    /**
     * Get villenaissanceartisan
     *
     * @return string
     */
    public function getVillenaissanceartisan()
    {
        return $this->villenaissanceartisan;
    }

    /**
     * Set paysnaissanceartisan
     *
     * @param string $paysnaissanceartisan
     *
     * @return Artisan
     */
    public function setPaysnaissanceartisan($paysnaissanceartisan)
    {
        $this->paysnaissanceartisan = $paysnaissanceartisan;

        return $this;
    }

    /**
     * Get paysnaissanceartisan
     *
     * @return string
     */
    public function getPaysnaissanceartisan()
    {
        return $this->paysnaissanceartisan;
    }

    /**
     * Set telephoneartisan
     *
     * @param string $telephoneartisan
     *
     * @return Artisan
     */
    public function setTelephoneartisan($telephoneartisan)
    {
        $this->telephoneartisan = $telephoneartisan;

        return $this;
    }

    /**
     * Get telephoneartisan
     *
     * @return string
     */
    public function getTelephoneartisan()
    {
        return $this->telephoneartisan;
    }

    /**
     * Set adresseartisan
     *
     * @param string $adresseartisan
     *
     * @return Artisan
     */
    public function setAdresseartisan($adresseartisan)
    {
        $this->adresseartisan = $adresseartisan;

        return $this;
    }

    /**
     * Get adresseartisan
     *
     * @return string
     */
    public function getAdresseartisan()
    {
        return $this->adresseartisan;
    }

    /**
     * Set cpartisan
     *
     * @param string $cpartisan
     *
     * @return Artisan
     */
    public function setCpartisan($cpartisan)
    {
        $this->cpartisan = $cpartisan;

        return $this;
    }

    /**
     * Get cpartisan
     *
     * @return string
     */
    public function getCpartisan()
    {
        return $this->cpartisan;
    }

    /**
     * Set villeartisan
     *
     * @param string $villeartisan
     *
     * @return Artisan
     */
    public function setVilleartisan($villeartisan)
    {
        $this->villeartisan = $villeartisan;

        return $this;
    }

    /**
     * Get villeartisan
     *
     * @return string
     */
    public function getVilleartisan()
    {
        return $this->villeartisan;
    }

    /**
     * Set loginartisan
     *
     * @param string $loginartisan
     *
     * @return Artisan
     */
    public function setLoginartisan($loginartisan)
    {
        $this->loginartisan = $loginartisan;

        return $this;
    }

    /**
     * Get loginartisan
     *
     * @return string
     */
    public function getLoginartisan()
    {
        return $this->loginartisan;
    }

    /**
     * Set mdpartisan
     *
     * @param string $mdpartisan
     *
     * @return Artisan
     */
    public function setMdpartisan($mdpartisan)
    {
        $this->mdpartisan = $mdpartisan;

        return $this;
    }

    /**
     * Get mdpartisan
     *
     * @return string
     */
    public function getMdpartisan()
    {
        return $this->mdpartisan;
    }

    /**
     * Set premiereconnexion
     *
     * @param boolean $premiereconnexion
     *
     * @return Artisan
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
     * Set idcorpsmetier
     *
     * @param \JmBatiInterimBundle\Entity\Corpsmetier $idcorpsmetier
     *
     * @return Artisan
     */
    public function setIdcorpsmetier(\JmBatiInterimBundle\Entity\Corpsmetier $idcorpsmetier = null)
    {
        $this->idcorpsmetier = $idcorpsmetier;

        return $this;
    }

    /**
     * Get idcorpsmetier
     *
     * @return \JmBatiInterimBundle\Entity\Corpsmetier
     */
    public function getIdcorpsmetier()
    {
        return $this->idcorpsmetier;
    }

    /**
     * Add idmission
     *
     * @param \JmBatiInterimBundle\Entity\Mission $idmission
     *
     * @return Artisan
     */
    public function addIdmission(\JmBatiInterimBundle\Entity\Mission $idmission)
    {
        $this->idmission[] = $idmission;

        return $this;
    }

    /**
     * Remove idmission
     *
     * @param \JmBatiInterimBundle\Entity\Mission $idmission
     */
    public function removeIdmission(\JmBatiInterimBundle\Entity\Mission $idmission)
    {
        $this->idmission->removeElement($idmission);
    }

    /**
     * Get idmission
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdmission()
    {
        return $this->idmission;
    }
}
