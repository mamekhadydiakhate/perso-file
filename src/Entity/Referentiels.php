<?php

namespace App\Entity;

use App\Entity\Referentiels;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReferentielsRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ReferentielsRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"Referentiels:read"}},
 *     denormalizationContext={"groups"={"Referentiels:write"}},
 *     collectionOperations={ "get","post"},
 *     itemOperations={"put" ,"get" ,"delete"}
 * )
 */
class Referentiels
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"referentiels:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

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
}
