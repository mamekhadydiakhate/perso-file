<?php

namespace App\Entity;

use App\Entity\GroupeTag;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\GroupeTagRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GroupeTagRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"GroupeTag:read"}},
 *     denormalizationContext={"groups"={"GroupeTag:write"}},
 *     collectionOperations={ "get","post"},
 *     itemOperations={"put" ,"get" ,"delete"}
 * )
 */
class GroupeTag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"GroupeTag:read"})
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
