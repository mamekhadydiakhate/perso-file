<?php

namespace App\Entity;


use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"user:read"}},
 *     denormalizationContext={"groups"={"user:write"}},
 *     collectionOperations=
 * { 
 *   "get_role_admin"={
 *        "method"="GET",
 *        "path"="/admin/users", 
 *        "security"= "is_granted('ROLE_ADMIN')"     
 *       },
 *   "post_role_admin"={
 *        "method"="POST",
 *        "path"="/admin/users"       
 *       },       
 *  },
 *     itemOperations=
 * {
 *   "put_role_admin"={
 *        "method"="PUT",
 *        "path"="/admin/users/{id}"       
 *       }, 
 *   "delete_role_admin"={
 *        "method"="DELETE",
 *        "path"="/admin/users/{id}"       
 *       },
 *   "get_role_admin"={
 *        "method"="GET",
 *        "path"="/admin/users/{id}"      
 *       },
 * }
 *)
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\InheritanceType("JOINED")
 * @DiscriminatorColumn(name="type", type="string")
 * @DiscriminatorMap( 
 *     {"apprenants"="Apprenants", "formateur"="Formateur" ,
 *     "administrateur"="Administrateur" ,"CM"="CM" ,"user"="User"})
 * 
 */
class User implements UserInterface
{ 
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"user:read"})
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"user:read"})
     * @Assert\NotBlank (message="Le Code est obligatoire")
    */
    protected $email;

    protected $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank (message="Le Code est obligatoire")
     */
    protected $password;

    /**
     * @ORM\ManyToOne(targetEntity=Profils::class, inversedBy="User")
     * @Groups({"user:read","user:write"})
     * @Assert\NotBlank (message="Le Code est obligatoire")
     */
    protected $profils;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read"}) 
     * @Assert\NotBlank (message="Le Code est obligatoire")
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read"})
     * @Assert\NotBlank (message="Le Code est obligatoire")
     */
    protected $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read"})
     * @Assert\NotBlank (message="Le Code est obligatoire")
     */
    protected $telephone;
    
    /**
     * @ORM\Column(type="blob")
     * @Groups({"user:read"})
     * @Assert\NotBlank (message="Le Code est obligatoire")
     */
    protected $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // garantir que chaque utilisateur a au moins ROLE_USER
        $roles[] = 'ROLE_'.$this->profils->getLibelle();

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getProfils(): ?Profils
    {
        return $this->profils;
    }

    public function setProfils(?Profils $profils): self
    {
        $this->profils = $profils;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPhoto()
    {
        //return $this->photo;
        return base64_decode($this->photo);
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
