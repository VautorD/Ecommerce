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

    /**
     * @var Collection<int, Produit>
     */
    #[ORM\OneToMany(targetEntity: Produit::class, mappedBy: 'lignePanier')]
    private Collection $Produits;

    #[ORM\Column(length: 50)]
    private ?string $Quantité = null;

    public function __construct()
    {
        $this->Produits = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->Produits;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->Produits->contains($produit)) {
            $this->Produits->add($produit);
            $produit->setLignePanier($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->Produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getLignePanier() === $this) {
                $produit->setLignePanier(null);
            }
        }

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
