<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaskRepository::class)]
class Task
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?bool $important = false;

    #[ORM\Column]
    private ?bool $myday = false;

    

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $planned = null;

    #[ORM\ManyToOne(inversedBy: 'tasks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function __construct(){
        $this->createdAt = new \DatetimeImmutable();
        $this->myday = false;
        $this->important = false;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function isImportant(): ?bool
    {
        return $this->important;
    }

    public function setImportant(bool $important): static
    {
        $this->important = $important;

        return $this;
    }

    public function isMyday(): ?bool
    {
        return $this->myday;
    }

    public function setMyday(bool $myday): static
    {
        $this->myday = $myday;

        return $this;
    }

    public function getPlanned(): ?\DateTimeInterface
    {
        return $this->planned;
    }

    public function setPlanned(?\DateTimeInterface $planned): static
    {
        $this->planned = $planned;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
