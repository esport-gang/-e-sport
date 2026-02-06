<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private string $name;

    #[ORM\ManyToMany(targetEntity: User::class)]
    private Collection $members;

    #[ORM\ManyToOne(targetEntity: Tournament::class)]
    private ?Tournament $tournament = null;
    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $owner = null;  // <-- Nouveau champ owner
    public function __construct()
    {
        $this->members = new ArrayCollection();
    }
    // src/Entity/Equipe.php

public function getName(): ?string
{
    return $this->name;
}

public function setName(string $name): self
{
    $this->name = $name;
    return $this;
}

public function getTournament(): ?Tournament
{
    return $this->tournament;
}

public function setTournament(?Tournament $tournament): self
{
    $this->tournament = $tournament;
    return $this;
}

/** Pour les membres ManyToMany */
public function getMembers(): Collection
{
    return $this->members;
}

public function addMember(User $user): self
{
    if (!$this->members->contains($user)) {
        $this->members->add($user);
    }
    return $this;
}

public function removeMember(User $user): self
{
    $this->members->removeElement($user);
    return $this;
}
public function getId(): ?int
{
    return $this->id;
}

public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;
        return $this;
    }
}
