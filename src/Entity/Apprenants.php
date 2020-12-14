<?php

namespace App\Entity;

use App\Entity\User;
use App\Entity\Apprenants;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ApprenantsRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank (message="Le Code est obligatoire")
     * @Groups({"Apprenant:read"})
     */
    private $adresse;

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

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
