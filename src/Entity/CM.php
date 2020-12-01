<?php

namespace App\Entity;

use App\Entity\CM;
use App\Repository\CMRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=CMRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"CM:read"}},
 *     denormalizationContext={"groups"={"CM:write"}},
 *     collectionOperations={ "get","post"},
 *     itemOperations={"put" ,"get" ,"delete"}
 * )
 */
class CM extends user
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
