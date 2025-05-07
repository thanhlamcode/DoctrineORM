<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\ManyToOne;

#[ApiResource]
#[Entity]
#[ORM\Index(fields: ['name'])]
class Store
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'integer')]
    private string $name;

    #[ORM\OneToMany(targetEntity: POS::class, mappedBy: 'store')]
    private Collection $posList;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPosList(): Collection
    {
        return $this->posList;
    }

    public function setPosList(Collection $posList): void
    {
        $this->posList = $posList;
    }
}