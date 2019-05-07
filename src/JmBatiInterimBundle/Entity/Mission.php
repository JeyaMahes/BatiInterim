<?php

namespace JmBatiInterimBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mission
 *
 * @ORM\Table(name="Mission", indexes={@ORM\Index(name="FK_Mission_Chantier", columns={"idChantier"}), @ORM\Index(name="FK_Mission_CorpsMetier", columns={"idCorpsMetier"})})
 * @ORM\Entity(repositoryClass="JmBatiInterimBundle\Repository\MissionRepository")
 */
class Mission
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
     * @ORM\Column(name="intituleMission", type="string", length=128, nullable=true)
     */
    private $intitulemission;

    /**
     * @var integer
     *
     * @ORM\Column(name="nombreArtisans", type="integer", nullable=true)
     */
    private $nombreartisans;

    /**
     * @var integer
     *
     * @ORM\Column(name="prixJournalier", type="integer", nullable=true)
     */
    private $prixjournalier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebutMission", type="date", nullable=true)
     */
    private $datedebutmission;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinMission", type="date", nullable=true)
     */
    private $datefinmission;

    /**
     * @var \Chantier
     *
     * @ORM\ManyToOne(targetEntity="Chantier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idChantier", referencedColumnName="id")
     * })
     */
    private $idchantier;

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
     * @ORM\ManyToMany(targetEntity="Artisan", inversedBy="idmission")
     * @ORM\JoinTable(name="affecter",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idMission", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idArtisan", referencedColumnName="id")
     *   }
     * )
     */
    private $idartisan;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idartisan = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set intitulemission
     *
     * @param string $intitulemission
     *
     * @return Mission
     */
    public function setIntitulemission($intitulemission)
    {
        $this->intitulemission = $intitulemission;

        return $this;
    }

    /**
     * Get intitulemission
     *
     * @return string
     */
    public function getIntitulemission()
    {
        return $this->intitulemission;
    }

    /**
     * Set nombreartisans
     *
     * @param integer $nombreartisans
     *
     * @return Mission
     */
    public function setNombreartisans($nombreartisans)
    {
        $this->nombreartisans = $nombreartisans;

        return $this;
    }

    /**
     * Get nombreartisans
     *
     * @return integer
     */
    public function getNombreartisans()
    {
        return $this->nombreartisans;
    }

    /**
     * Set prixjournalier
     *
     * @param integer $prixjournalier
     *
     * @return Mission
     */
    public function setPrixjournalier($prixjournalier)
    {
        $this->prixjournalier = $prixjournalier;

        return $this;
    }

    /**
     * Get prixjournalier
     *
     * @return integer
     */
    public function getPrixjournalier()
    {
        return $this->prixjournalier;
    }

    /**
     * Set datedebutmission
     *
     * @param \DateTime $datedebutmission
     *
     * @return Mission
     */
    public function setDatedebutmission($datedebutmission)
    {
        $this->datedebutmission = $datedebutmission;

        return $this;
    }

    /**
     * Get datedebutmission
     *
     * @return \DateTime
     */
    public function getDatedebutmission()
    {
        return $this->datedebutmission;
    }

    /**
     * Set datefinmission
     *
     * @param \DateTime $datefinmission
     *
     * @return Mission
     */
    public function setDatefinmission($datefinmission)
    {
        $this->datefinmission = $datefinmission;

        return $this;
    }

    /**
     * Get datefinmission
     *
     * @return \DateTime
     */
    public function getDatefinmission()
    {
        return $this->datefinmission;
    }

    /**
     * Set idchantier
     *
     * @param \JmBatiInterimBundle\Entity\Chantier $idchantier
     *
     * @return Mission
     */
    public function setIdchantier(\JmBatiInterimBundle\Entity\Chantier $idchantier = null)
    {
        $this->idchantier = $idchantier;

        return $this;
    }

    /**
     * Get idchantier
     *
     * @return \JmBatiInterimBundle\Entity\Chantier
     */
    public function getIdchantier()
    {
        return $this->idchantier;
    }

    /**
     * Set idcorpsmetier
     *
     * @param \JmBatiInterimBundle\Entity\Corpsmetier $idcorpsmetier
     *
     * @return Mission
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
     * Add idartisan
     *
     * @param \JmBatiInterimBundle\Entity\Artisan $idartisan
     *
     * @return Mission
     */
    public function addIdartisan(\JmBatiInterimBundle\Entity\Artisan $idartisan)
    {
        $this->idartisan[] = $idartisan;

        return $this;
    }

    /**
     * Remove idartisan
     *
     * @param \JmBatiInterimBundle\Entity\Artisan $idartisan
     */
    public function removeIdartisan(\JmBatiInterimBundle\Entity\Artisan $idartisan)
    {
        $this->idartisan->removeElement($idartisan);
    }

    /**
     * Get idartisan
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdartisan()
    {
        return $this->idartisan;
    }
}
