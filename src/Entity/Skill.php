<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SkillRepository::class)
 */
class Skill
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
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="skills")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity=Rocket::class, mappedBy="skills")
     */
    private $rockets;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->rockets = new ArrayCollection();
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

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addSkill($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeSkill($this);
        }

        return $this;
    }

    /**
     * @return Collection|Rocket[]
     */
    public function getRockets(): Collection
    {
        return $this->rockets;
    }

    public function addRocket(Rocket $rocket): self
    {
        if (!$this->rockets->contains($rocket)) {
            $this->rockets[] = $rocket;
            $rocket->addSkill($this);
        }

        return $this;
    }

    public function removeRocket(Rocket $rocket): self
    {
        if ($this->rockets->removeElement($rocket)) {
            $rocket->removeSkill($this);
        }

        return $this;
    }
}
