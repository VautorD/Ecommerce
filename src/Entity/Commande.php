<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Num_Commande = null;

    #[ORM\Column]
    private ?bool $Valide = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $users = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Panier $paniers = null;

    /**
     * @var Collection<int, LignesCommande>
     */
    #[ORM\OneToMany(targetEntity: LignesCommande::class, mappedBy: 'commandes')]
    private Collection $lignesCommandes;

    public function __construct()
    {
        $this->lignesCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isValide(): ?bool
    {
        return $this->Valide;
    }

    public function setValide(bool $Valide): static
    {
        $this->Valide = $Valide;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): static
    {
        $this->users = $users;

        return $this;
    }

    public function getPaniers(): ?Panier
    {
        return $this->paniers;
    }

    public function setPaniers(?Panier $paniers): static
    {
        $this->paniers = $paniers;

        return $this;
    }

    /**
     * @return Collection<int, LignesCommande>
     */
    public function getLignesCommandes(): Collection
    {
        return $this->lignesCommandes;
    }

    public function addLignesCommande(LignesCommande $lignesCommande): static
    {
        if (!$this->lignesCommandes->contains($lignesCommande)) {
            $this->lignesCommandes->add($lignesCommande);
            $lignesCommande->setCommandes($this);
        }

        return $this;
    }

    public function removeLignesCommande(LignesCommande $lignesCommande): static
    {
        if ($this->lignesCommandes->removeElement($lignesCommande)) {
            // set the owning side to null (unless already changed)
            if ($lignesCommande->getCommandes() === $this) {
                $lignesCommande->setCommandes(null);
            }
        }

        return $this;
    }

}
