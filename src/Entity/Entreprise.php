<?php

namespace App\Entity;

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
}