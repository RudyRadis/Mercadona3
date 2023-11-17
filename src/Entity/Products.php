<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descrip = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $categ = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imgPath = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?bool $promoBool = null;

    #[ORM\Column(nullable: true)]
    private ?int $promoValue = null;

    #[ORM\Column(nullable: true)]
    private ?float $promoPrice = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $creationDate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $endingDate = null;

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

    public function getDescrip(): ?string
    {
        return $this->descrip;
    }

    public function setDescrip(?string $descrip): static
    {
        $this->descrip = $descrip;

        return $this;
    }

    public function getCateg(): ?string
    {
        return $this->categ;
    }

    public function setCateg(?string $categ): static
    {
        $this->categ = $categ;

        return $this;
    }

    public function getImgPath(): ?string
    {
        return $this->imgPath;
    }

    public function setImgPath(?string $imgPath): static
    {
        $this->imgPath = $imgPath;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function isPromoBool(): ?bool
    {
        return $this->promoBool;
    }

    public function setPromoBool(bool $promoBool): static
    {
        $this->promoBool = $promoBool;

        return $this;
    }

    public function getPromoValue(): ?int
    {
        return $this->promoValue;
    }

    public function setPromoValue(?int $promoValue): static
    {
        $this->promoValue = $promoValue;

        return $this;
    }

    public function getPromoPrice(): ?float
    {
        return $this->promoPrice;
    }

    public function setPromoPrice(?float $promoPrice): static
    {
        $this->promoPrice = $promoPrice;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(?\DateTimeInterface $creationDate): static
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getEndingDate(): ?\DateTimeInterface
    {
        return $this->endingDate;
    }

    public function setEndingDate(?\DateTimeInterface $endingDate): static
    {
        $this->endingDate = $endingDate;

        return $this;
    }
}
