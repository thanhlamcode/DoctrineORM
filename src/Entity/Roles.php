<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

#[Entity]
#[ApiResource]
class Roles
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $role;

    #[ORM\ManyToMany(targetEntity: Permission::class, inversedBy: 'roles', cascade: ['persist', 'remove'])]
    private Collection $permissions;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
        $this->permissions = new ArrayCollection();
    }

    // --- GETTERS ---

    public function getId(): int
    {
        return $this->id;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function getPermissions(): Collection
    {
        return $this->permissions;
    }

    // --- SETTERS ---

    public function setRole(string $role): self
    {
        $this->role = $role;
        return $this;
    }

    // --- COLLECTION HELPERS FOR USER ---

    public function addUser(User $user): self
    {
        if (!$this->user_id->contains($user)) {
            $this->user_id[] = $user;
            $user->addRole($this);
        }
        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user_id->removeElement($user)) {
            $user->removeRole($this);
        }
        return $this;
    }

    // --- COLLECTION HELPERS FOR PERMISSION ---

    public function addPermission(Permission $permission): self
    {
        if (!$this->permissions->contains($permission)) {
            $this->permissions[] = $permission;
            $permission->addRole($this);
        }
        return $this;
    }

    public function removePermission(Permission $permission): self
    {
        if ($this->permissions->removeElement($permission)) {
            $permission->removeRole($this);
        }
        return $this;
    }
}
