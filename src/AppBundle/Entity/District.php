<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="district")
 */
class District
{
    /**
     * @ORM\Id;
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $nbEpp;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $nbCeg;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $nbLycee;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $population;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $electeurs;


    /**
     * @var Region $region
     *
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="districts", cascade={"persist", "merge"})
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * })
     */
    protected $region;
    /**
     * @var ArrayCollection $promesses
     *
     * @ORM\OneToMany(targetEntity="Promesse", mappedBy="district", cascade={"persist", "remove", "merge"})
     */
    private $promesses;

    /**
     * @var ArrayCollection $districts
     *
     * @ORM\OneToMany(targetEntity="Commune", mappedBy="district", cascade={"persist", "remove", "merge"})
     */
    private $communes;

    public function __construct()
    {
        $this->promesses = new ArrayCollection();
        $this->communes = new ArrayCollection();
    }

    public function addPromesse(Promesse $promesse)
    {
        $promesse->setDistrict($this);

        // Si l'objet fait déjà partie de la collection on ne l'ajoute pas
        if (!$this->promesses->contains($promesse)) {
            $this->promesses->add($promesse);
        }
    }

    public function addCommune(Commune $commune)
    {
        $commune->setDistrict($this);

        // Si l'objet fait déjà partie de la collection on ne l'ajoute pas
        if (!$this->communes->contains($commune)) {
            $this->communes->add($commune);
        }
    }

    /**
     * @return ArrayCollection $promesses
     */
    public function getPromesses()
    {
        return $this->promesses;
    }
    /**
     * @return ArrayCollection $promesses
     */
    public function getCommunes()
    {
        return $this->communes;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $id
     */
    public function setRegion(Region $region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNbEpp()
    {
        return $this->nbEpp;
    }

    /**
     * @param mixed $nbEpp
     */
    public function setNbEpp($nbEpp)
    {
        $this->nbEpp = $nbEpp;
    }

    /**
     * @return mixed
     */
    public function getNbCeg()
    {
        return $this->nbCeg;
    }

    /**
     * @param mixed $nbCeg
     */
    public function setNbCeg($nbCeg)
    {
        $this->nbCeg = $nbCeg;
    }

    /**
     * @return mixed
     */
    public function getNbLycee()
    {
        return $this->nbLycee;
    }

    /**
     * @param mixed $nbLycee
     */
    public function setNbLycee($nbLycee)
    {
        $this->nbLycee = $nbLycee;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @param mixed $population
     */
    public function setPopulation($population)
    {
        $this->population = $population;
    }

    /**
     * @return mixed
     */
    public function getElecteurs()
    {
        return $this->electeurs;
    }

    /**
     * @param mixed $electeurs
     */
    public function setElecteurs($electeurs)
    {
        $this->electeurs = $electeurs;
    }

}