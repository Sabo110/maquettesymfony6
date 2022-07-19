<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $service;

    #[ORM\Column(type: 'string', length: 255)]
    private $besoin;

    #[ORM\Column(type: 'integer')]
    private $quantite;

    #[ORM\Column(type: 'integer')]
    private $qtstock;

    #[ORM\Column(type: 'date')]
    private $dat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getService(): ?string
    {
        return $this->service;
    }

    public function setService(string $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getBesoin(): ?string
    {
        return $this->besoin;
    }

    public function setBesoin(string $besoin): self
    {
        $this->besoin = $besoin;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getQtstock(): ?int
    {
        return $this->qtstock;
    }

    public function setQtstock(int $qtstock): self
    {
        $this->qtstock = $qtstock;

        return $this;
    }

    public function getDat(): ?\DateTimeInterface
    {
        return $this->dat;
    }

    public function setDat(\DateTimeInterface $dat): self
    {
        $this->dat = $dat;

        return $this;
    }
}
