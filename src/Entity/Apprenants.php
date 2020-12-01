<?php

namespace App\Entity;

use App\Entity\User;
use App\Entity\Apprenants;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ApprenantsRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ApprenantsRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"Apprenants:read"}},
 *     denormalizationContext={"groups"={"Apprenants:write"}},
 *     collectionOperations={ "get","post"},
 *     itemOperations={"put" ,"get" ,"delete"}
 * )
 */
class Apprenants extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"apprenants:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\ManyToOne(targetEntity=profils::class, inversedBy="apprenants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $profils;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

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
    public function getProfils(): ?profils
    {
        return $this->APPRENANT;
    }

    public function setProfils(?profils $profils): self
    {
        $this->profils = 'APPRENANT';

        return $this;
    }
}
