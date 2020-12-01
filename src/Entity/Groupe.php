<?php

namespace App\Entity;

use App\Entity\Groupe;
use App\Entity\Promos;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\GroupeRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GroupeRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"goupe:read"}},
 *     denormalizationContext={"groups"={"groupe:write"}},
 *     collectionOperations={ "get","post"},
 *     itemOperations={"put" ,"get" ,"delete"}
 * )
 */
class Groupe
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"Groupe:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $periode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity=Promos::class, inversedBy="groupes")
     */
    private $promos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(string $periode): self
    {
        $this->periode = $periode;

        return $this;
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

    public function getPromos(): ?Promos
    {
        return $this->promos;
    }

    public function setPromos(?Promos $promos): self
    {
        $this->promos = $promos;

        return $this;
    }
}
