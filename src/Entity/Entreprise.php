<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EntrepriseRepository")
 */
class Entreprise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $siteWeb;

    /**
     * @ORM\Column(type="string", length=50)
     */    
    private $activite;

        /**
     * @ORM\Column(type="string", length=20)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stage", mappedBy="entreprise")
     */
    private $stages;

    public function __construct()
    {
        $this->stages = new ArrayCollection();
    }

        /**
     * @ORM\Column(type="string", length=50)
     */

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }
    
    public function setNom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }

    public function getSiteWeb(): ?string
    {
        return $this->siteWeb;
    }
    
    public function setSiteWeb(string $siteWeb): self
    {
        $this->siteWeb = $siteWeb;
        return $this;
    }
 
    public function getActivite(): ?string
    {
        return $this->activite;
    }
    
    public function setActivite(string $activite): self
    {
        $this->activite = $activite;
        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }
    
    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }

    /**
     * @return Collection|Stage[]
     */
    public function getStages(): Collection
    {
        return $this->stages;
    }

    public function addStage(Stage $stage): self
    {
        if (!$this->stages->contains($stage)) {
            $this->stages[] = $stage;
            $stage->setEntreprise($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): self
    {
        if ($this->stages->contains($stage)) {
            $this->stages->removeElement($stage);
            // set the owning side to null (unless already changed)
            if ($stage->getEntreprise() === $this) {
                $stage->setEntreprise(null);
            }
        }

        return $this;
    }    
}
