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

    #[ORM\OneToOne(targetEntity: POSConfig::class, mappedBy: 'POS')]
    private POSConfig $config;

    #[ORM\ManyToOne(targetEntity: Store::class, inversedBy: 'posList')]
    #[ORM\JoinColumn(name: 'store_id', referencedColumnName: 'id')]
    private Store $store;
}