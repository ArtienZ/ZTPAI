<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @method string getUserIdentifier()
 */
#[ApiResource]
class User implements UserInterface,\Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $surname;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="integer")
     */
    private $role;

    /**
     * @ORM\ManyToMany(targetEntity=UsersExercises::class, mappedBy="user_id")
     */
    private $Exercises;

    public function __construct()
    {
        $this->exercies_id = new ArrayCollection();
        $this->Exercises = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getRole(): ?int
    {
        return $this->role;
    }

    public function setRole(int $role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection|UsersExercises[]
     */
    public function getExercises(): Collection
    {
        return $this->Exercises;
    }

    public function addExercise(UsersExercises $exercise): self
    {
        if (!$this->Exercises->contains($exercise)) {
            $this->Exercises[] = $exercise;
            $exercise->addUserId($this);
        }

        return $this;
    }

    public function removeExercise(UsersExercises $exercise): self
    {
        if ($this->Exercises->removeElement($exercise)) {
            $exercise->removeUserId($this);
        }

        return $this;
    }

    public function getRoles()
    {
        // TODO: Implement getRoles() method.
        return['ROLE_USER'];
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.

    }

    public function getUsername()
    {
        return $this->getEmail();
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function serialize()
    {
       return serialize([
           $this->id,
           $this->name,
           $this->surname,
           $this->email,
           $this->password,
           $this->phone,
           $this->photo,
           $this->role
       ]);
    }

    public function unserialize($data)
    {
        list(
            $this->id,
            $this->name,
            $this->surname,
            $this->email,
            $this->password,
            $this->phone,
            $this->photo,
            $this->role
            ) = unserialize($data, ['allowed_classes'=>false]);
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }
}
