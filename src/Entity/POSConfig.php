<?php

namespace App\Entity;


use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;
#[ApiResource]
#[Entity]
class POSConfig
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\OneToOne(targetEntity: POS::class, inversedBy: 'config', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'pos_id', referencedColumnName: 'id')]
    private POS $pos;


    #[ORM\Column(type: 'string')]
    private string $timezone;

    #[ORM\Column(type: 'boolean')]
    private bool $is24HourFormat;

    // --- GETTERS ---

    public function getId(): int
    {
        return $this->id;
    }

    public function getPos(): POS
    {
        return $this->pos;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }

    public function is24HourFormat(): bool
    {
        return $this->is24HourFormat;
    }

    // --- SETTERS ---

    public function setPos(POS $pos): self
    {
        $this->pos = $pos;
        return $this;
    }

    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;
        return $this;
    }

    public function setIs24HourFormat(bool $is24HourFormat): self
    {
        $this->is24HourFormat = $is24HourFormat;
        return $this;
    }
}