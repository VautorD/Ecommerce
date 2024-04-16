<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'paniers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $users = null;

    /**
     * @var Collection<int, LignePanier>
     */
    #[ORM\OneToMany(targetEntity: LignePanier::class, mappedBy: 'Paniers')]
    private Collection $lignePaniers;

    public function __construct()
    {
        $this->lignePaniers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, LignePanier>
     */
    public function getLignePaniers(): Collection
    {
        return $this->lignePaniers;
    }

    public function addLignePanier(LignePanier $lignePanier): static
    {
        if (!$this->lignePaniers->contains($lignePanier)) {
            $this->lignePaniers->add($lignePanier);
            $lignePanier->setPaniers($this);
        }

        return $this;
    }

    public function removeLignePanier(LignePanier $lignePanier): static
    {
        if ($this->lignePaniers->removeElement($lignePanier)) {
            // set the owning side to null (unless already changed)
            if ($lignePanier->getPaniers() === $this) {
                $lignePanier->setPaniers(null);
            }
        }

        return $this;
    }
}
