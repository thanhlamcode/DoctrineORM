<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;


#[ApiResource]
#[ORM\Entity]
class AttendanceRecord
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $timestamp;

    #[ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id', nullable: false)]
    private User $userId;

    #[ORM\ManyToOne(targetEntity: POS::class)]
    #[JoinColumn(name: 'pos_id', referencedColumnName: 'id')]
    private POS|null $pos = null;

    // Getter & Setter for id
    public function getId(): int
    {
        return $this->id;
    }

    // Getter & Setter for timestamp
    public function getTimestamp(): \DateTime
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTime $timestamp): self
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    // Getter & Setter for userId
    public function getUserId(): User
    {
        return $this->userId;
    }

    public function setUserId(User $user): self
    {
        $this->userId = $user;
        return $this;
    }

    // Getter & Setter for pos
    public function getPos(): ?POS
    {
        return $this->pos;
    }

    public function setPos(?POS $pos): self
    {
        $this->pos = $pos;
        return $this;
    }
}