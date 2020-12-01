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
 * @ApiResource(
 *     normalizationContext={"groups"={"Administrateur:read"}},
 *     denormalizationContext={"groups"={"Administrateur:write"}},
 *     collectionOperations={ "get","post"},
 *     itemOperations={"put" ,"get" ,"delete"}
 * )
 */
class Administrateur extends User
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

    /**
     * @ORM\OneToMany(targetEntity=groupecompetence::class, mappedBy="gerer")
     */
    private $Groupecompetence;

    /**
     * @ORM\ManyToOne(targetEntity=profilSorti::class, inversedBy="administrateurs")
     */
    private $profilSorti;

    public function __construct()
    {
        $this->promos = new ArrayCollection();
        $this->Groupecompetence = new ArrayCollection();
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

    /**
     * @return Collection|groupecompetence[]
     */
    public function getGroupecompetence(): Collection
    {
        return $this->Groupecompetence;
    }

    public function addGroupecompetence(groupecompetence $groupecompetence): self
    {
        if (!$this->Groupecompetence->contains($groupecompetence)) {
            $this->Groupecompetence[] = $groupecompetence;
            $groupecompetence->setGerer($this);
        }

        return $this;
    }

    public function removeGroupecompetence(groupecompetence $groupecompetence): self
    {
        if ($this->Groupecompetence->removeElement($groupecompetence)) {
            // set the owning side to null (unless already changed)
            if ($groupecompetence->getGerer() === $this) {
                $groupecompetence->setGerer(null);
            }
        }

        return $this;
    }

    public function getProfilSorti(): ?profilSorti
    {
        return $this->profilSorti;
    }

    public function setProfilSorti(?profilSorti $profilSorti): self
    {
        $this->profilSorti = $profilSorti;

        return $this;
    }
}
