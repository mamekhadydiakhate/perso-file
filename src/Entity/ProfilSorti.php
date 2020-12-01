<?php

namespace App\Entity;

use App\Entity\ProfilSorti;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfilSortiRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProfilSortiRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"profilSorti:read"}},
 *     denormalizationContext={"groups"={"profilSorti:write"}},
 *     collectionOperations={ "get","post"},
 *     itemOperations={"put" ,"get" ,"delete"}
 * )
 */
class ProfilSorti
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"profilSorti:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Administrateur::class, mappedBy="profilSorti")
     */
    private $administrateurs;

    public function __construct()
    {
        $this->administrateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Administrateur[]
     */
    public function getAdministrateurs(): Collection
    {
        return $this->administrateurs;
    }

    public function addAdministrateur(Administrateur $administrateur): self
    {
        if (!$this->administrateurs->contains($administrateur)) {
            $this->administrateurs[] = $administrateur;
            $administrateur->setProfilSorti($this);
        }

        return $this;
    }

    public function removeAdministrateur(Administrateur $administrateur): self
    {
        if ($this->administrateurs->removeElement($administrateur)) {
            // set the owning side to null (unless already changed)
            if ($administrateur->getProfilSorti() === $this) {
                $administrateur->setProfilSorti(null);
            }
        }

        return $this;
    }
}
