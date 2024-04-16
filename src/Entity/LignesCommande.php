<?php

namespace App\Entity;

use App\Repository\LignesCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LignesCommandeRepository::class)]
class LignesCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'lignesCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $produits = null;

    #[ORM\ManyToOne(inversedBy: 'lignesCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $commandes = null;

    #[ORM\Column(length: 50)]
    private ?string $Quantité = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduits(): ?Produit
    {
        return $this->produits;
    }

    public function setProduits(?Produit $produits): static
    {
        $this->produits = $produits;

        return $this;
    }

    public function getCommandes(): ?Commande
    {
        return $this->commandes;
    }

    public function setCommandes(?Commande $commandes): static
    {
        $this->commandes = $commandes;

        return $this;
    }

    public function getQuantité(): ?string
    {
        return $this->Quantité;
    }

    public function setQuantité(string $Quantité): static
    {
        $this->Quantité = $Quantité;

        return $this;
    }
}
