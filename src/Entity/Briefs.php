<?php

namespace App\Entity;

use App\Entity\Briefs;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\BriefsRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=BriefsRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups"={"briefs:read"}},
 *     denormalizationContext={"groups"={"briefs:write"}},
 *     collectionOperations={ "get","post"},
 *     itemOperations={"put" ,"get" ,"delete"}
 * )
 */
class Briefs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $enonce;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="date")
     */
    private $heure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $livrable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $acquis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contraintes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ressources;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getEnonce(): ?string
    {
        return $this->enonce;
    }

    public function setEnonce(string $enonce): self
    {
        $this->enonce = $enonce;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getLivrable(): ?string
    {
        return $this->livrable;
    }

    public function setLivrable(string $livrable): self
    {
        $this->livrable = $livrable;

        return $this;
    }

    public function getAcquis(): ?string
    {
        return $this->acquis;
    }

    public function setAcquis(string $acquis): self
    {
        $this->acquis = $acquis;

        return $this;
    }

    public function getContraintes(): ?string
    {
        return $this->contraintes;
    }

    public function setContraintes(string $contraintes): self
    {
        $this->contraintes = $contraintes;

        return $this;
    }

    public function getRessources(): ?string
    {
        return $this->ressources;
    }

    public function setRessources(string $ressources): self
    {
        $this->ressources = $ressources;

        return $this;
    }
}
