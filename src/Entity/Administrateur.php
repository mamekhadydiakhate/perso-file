<?php

namespace App\Entity;

use App\Entity\Administrateur;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdministrateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

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
     * @ORM\ManyToMany(targetEntity=Promos::class, inversedBy="administrateurs")
     */
    private $promos;

    /**
     * @ORM\OneToMany(targetEntity=Groupecompetence::class, mappedBy="gerer")
     */
    private $Groupecompetence;

    public function __construct()
    {
        $this->promos = new ArrayCollection();
        $this->Groupecompetence = new ArrayCollection();
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
}
