<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UsersExercisesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UsersExercisesRepository::class)
 */
class UsersExercises
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="Exercises")
     */
    private $user_id;

    /**
     * @ORM\ManyToMany(targetEntity=Exercises::class)
     */
    private $exercises_id;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
        $this->exercises_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|User[]
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(User $userId): self
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id[] = $userId;
        }

        return $this;
    }

    public function removeUserId(User $userId): self
    {
        $this->user_id->removeElement($userId);

        return $this;
    }

    /**
     * @return Collection|Exercises[]
     */
    public function getExercisesId(): Collection
    {
        return $this->exercises_id;
    }

    public function addExercisesId(Exercises $exercisesId): self
    {
        if (!$this->exercises_id->contains($exercisesId)) {
            $this->exercises_id[] = $exercisesId;
        }

        return $this;
    }

    public function removeExercisesId(Exercises $exercisesId): self
    {
        $this->exercises_id->removeElement($exercisesId);

        return $this;
    }
}
