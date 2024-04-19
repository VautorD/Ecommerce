<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class ProduitFixtures extends Fixture
{
    public function __construct(private SluggerInterface $sluggerInterface){

    }
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for($prod = 1; $prod <= 3 ; $prod++ ){
            $produit = new Produit();
            $produit->setNom($faker->text(5));
            $produit->setType($faker->text());
            $produit->setCouleur($faker->text(5));
            $produit->setTaille($faker->text(5));
            $produit->setSlug($this->sluggerInterface->slug($produit->getNom())->lower());
            $produit->setPrix($faker->numberBetween(10, 150));
            $produit->setStock($faker->numberBetween(0, 5));

            $categorie = $this->getReference('cat-'.rand(1,11));
            $produit->setCategorie($categorie);

            $this->setReference('prod-'.$prod, $produit);
            $manager->persist($produit);
            }

        $manager->flush();
    }
}