<?php

namespace App\Entity;

use App\Repository\LignesCommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LignesCommandeRepository::class)]
class LignesCommande
{

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'lignesCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $produits = null;

    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'lignesCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $commandes = null;

    #[ORM\Column(length: 50)]
    private ?string $Quantite = null;

    #[ORM\Column]
    private ?float $Prix = null;

    public function getPrix(): ?float
    {
        return $this->Prix;
    }

    public function setPrix(float $Prix): static
    {
        $this->Prix = $Prix;

        return $this;
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
