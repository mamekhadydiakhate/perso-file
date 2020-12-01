<?php

namespace App\Entity;

use App\Entity\LivrableAtendus;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LivrableAtendusRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=LivrableAtendusRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"LivrableAtendus:read"}},
 *     denormalizationContext={"groups"={"LivrableAtendus:write"}},
 *     collectionOperations={ "get","post"},
 *     itemOperations={"put" ,"get" ,"delete"}
 * )
 */
class LivrableAtendus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"LivrableAtendus:read"})
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
