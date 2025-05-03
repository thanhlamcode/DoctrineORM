<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

#[Entity]
class POSConfig
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\OneToOne(targetEntity: POS::class ,inversedBy: 'config')]
    #[ORM\JoinColumn(name: 'pos_id', referencedColumnName: 'id')]
    private POS $pos;

    #[ORM\Column(type: 'string')]
    private string $timezone;

    #[ORM\Column(type: 'boolean')]
    private bool $is24HourFormat;
}