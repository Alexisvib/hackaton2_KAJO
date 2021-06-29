<?php

namespace App\Entity;

use App\Repository\RocketRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RocketRepository::class)
 */
class Rocket
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;



    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="rockets")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class, inversedBy="rockets")
     */
    private $skills;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $startedAt;

    /**
     * @ORM\ManyToMany(targetEntity=User::class)
     */
    private $appliants;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->skills = new ArrayCollection();
        $this->appliants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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
            $user->addRocket($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeRocket($this);
        }

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        $this->skills->removeElement($skill);

        return $this;
    }

    public function getStartedAt(): ?\DateTimeInterface
    {
        return $this->startedAt;
    }

    public function setStartedAt(?\DateTimeInterface $startedAt): self
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getAppliants(): Collection
    {
        return $this->appliants;
    }

    public function addAppliant(User $appliant): self
    {
        if (!$this->appliants->contains($appliant)) {
            $this->appliants[] = $appliant;
        }

        return $this;
    }

    public function removeAppliant(User $appliant): self
    {
        $this->appliants->removeElement($appliant);

        return $this;
    }
}
