<?php

namespace App\Entity;

use App\Entity\LivrableAtendus;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\LivrableAtendusRepository;

/**
 * @ORM\Entity(repositoryClass=LivrableAtendusRepository::class)
 * @ApiResource()
 */
class LivrableAtendus
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
