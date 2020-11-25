<?php

namespace App\Entity;

use App\Entity\Administrateur;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdministrateurRepository;

/**
 * @ORM\Entity(repositoryClass=AdministrateurRepository::class)
 * @ApiResource()
 */
class Administrateur extends Utilisateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Profils::class, inversedBy="administrateur")
     */
    private $profils;

    /**
     * @ORM\ManyToMany(targetEntity=promos::class, inversedBy="administrateurs")
     */
    private $promos;

    public function __construct()
    {
        $this->promos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProfils(): ?Profils
    {
        return $this->profils;
    }

    public function setProfils(?Profils $profils): self
    {
        $this->profils = $profils;

        return $this;
    }

    /**
     * @return Collection|promos[]
     */
    public function getPromos(): Collection
    {
        return $this->promos;
    }

    public function addPromo(promos $promo): self
    {
        if (!$this->promos->contains($promo)) {
            $this->promos[] = $promo;
        }

        return $this;
    }

    public function removePromo(promos $promo): self
    {
        $this->promos->removeElement($promo);

        return $this;
    }
}
