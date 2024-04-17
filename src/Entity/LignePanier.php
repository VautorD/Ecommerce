<?php

namespace App\Entity;

use App\Repository\LignePanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LignePanierRepository::class)]
class LignePanier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'lignePaniers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Panier $Paniers = null;

    #[ORM\ManyToOne(inversedBy: 'lignePaniers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $Produits = null;

    #[ORM\Column(length: 50)]
    private ?string $Quantite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaniers(): ?Panier
    {
        return $this->Paniers;
    }

    public function setPaniers(?Panier $Paniers): static
    {
        $this->Paniers = $Paniers;

        return $this;
    }

    public function getProduits(): ?Produit
    {
        return $this->Produits;
    }

    public function setProduits(?Produit $Produits): static
    {
        $this->Produits = $Produits;

        return $this;
    }

    public function getQuantite(): ?string
    {
        return $this->Quantite;
    }

    public function setQuantite(string $Quantite): static
    {
        $this->Quantite = $Quantite;

        return $this;
    }
}
