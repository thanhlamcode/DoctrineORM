<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity]
class Permission
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Roles::class, mappedBy: 'permissions')]
    #[ORM\JoinTable(name: 'permissions_roles')]
    private Collection $roles;

    public function __construct()
    {
        $this->roles = new ArrayCollection();
    }

    // --- GETTERS ---

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getRoles(): Collection
    {
        return $this->roles;
    }

    // --- SETTERS ---

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    // --- COLLECTION HELPERS ---

    public function addRole(Roles $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles[] = $role;
            $role->addPermission($this);
        }
        return $this;
    }

    public function removeRole(Roles $role): self
    {
        if ($this->roles->removeElement($role)) {
            $role->removePermission($this);
        }
        return $this;
    }
}
