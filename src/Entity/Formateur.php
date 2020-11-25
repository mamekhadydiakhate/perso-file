<?php

namespace App\Entity;

use App\Entity\Formateur;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\FormateurRepository;
use ApiPlatform\Core\Annotation\ApiResource;

  

/**
 * @ORM\Entity(repositoryClass=FormateurRepository::class)
 * @ApiResource()
 */
class Formateur extends Utilisateur
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
