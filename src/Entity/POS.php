<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource]
#[ORM\Entity]
class POS
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $name;

    #[ORM\Column(type: 'string')]
    private string $location;

    #[ORM\OneToOne(targetEntity: POSConfig::class, mappedBy: 'pos')]
    private POSConfig $config;

    #[ORM\ManyToOne(targetEntity: Store::class, inversedBy: 'posList')]
    #[ORM\JoinColumn(name: 'store_id', referencedColumnName: 'id')]
    private Store $store;

    public function getId(): int{
        return $this->id;
    }

    public function getName(): string{
        return $this->name;
    }

    public function setName(string $name): void{
        $this->name = $name;
    }
    public function getLocation(): string{
        return $this->location;
    }
    public function setLocation(string $location): void{
        $this->location = $location;
    }
    public function getConfig(): POSConfig{
        return $this->config;
    }

    public function getStore(): Store{
        return $this->store;
    }
}