<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping AS ORM;

#[ApiResource]
#[ORM\Entity]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $username;

    #[ORM\Column(type: 'string', length: 255)]
    private string $password;

    // Quan hệ: Nhiều user thuộc về 1 manager
    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'subordinates')]
    #[ORM\JoinColumn(name: 'manager_id', referencedColumnName: 'id', nullable: true)]
    private ?User $manager = null;

    // Quan hệ: 1 manager quản lý nhiều user
    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'manager')]
    private Collection $subordinates;

}