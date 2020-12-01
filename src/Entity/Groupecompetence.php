<?php

namespace App\Entity;

use App\Entity\Groupecompetence;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GroupecompetenceRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GroupecompetenceRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"Groupecompetence:read"}},
 *     denormalizationContext={"groups"={"Groupecompetence:write"}},
 *     collectionOperations={ "get","post"},
 *     itemOperations={"put" ,"get" ,"delete"}
 * )
 */
class Groupecompetence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"Groupecompetence:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Administrateur::class, inversedBy="Groupecompetence")
     */
    private $gerer;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getGerer(): ?Administrateur
    {
        return $this->gerer;
    }

    public function setGerer(?Administrateur $gerer): self
    {
        $this->gerer = $gerer;

        return $this;
    }
}
