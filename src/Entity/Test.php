<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TestRepository::class)]
class Test
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 40)]
    private ?string $my_name = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $my_first_name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMyName(): ?string
    {
        return $this->my_name;
    }

    public function setMyName(string $my_name): static
    {
        $this->my_name = $my_name;

        return $this;
    }

    public function getMyFirstName(): ?string
    {
        return $this->my_first_name;
    }

    public function setMyFirstName(?string $my_first_name): static
    {
        $this->my_first_name = $my_first_name;

        return $this;
    }
}
