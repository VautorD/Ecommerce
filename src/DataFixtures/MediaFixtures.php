<?php

namespace App\DataFixtures;

use App\Entity\Media;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class MediaFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for($img = 1; $img <= 3 ; $img++ ){
            $image = new Media();
            $image->setType($faker->text(5));
            $image->setLien($faker->image(null, 640, 480));
            $image->setAlt($faker->text(5));
            $produit = $this->getReference('prod-'.rand(1,10));
            $image->setProduit($produit);
            

            $manager->persist($image);
            }

        $manager->flush();
    }

    public function getDependencies() : array {
        return [
            ProduitFixtures::class
        ];
    }
}
