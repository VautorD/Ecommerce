<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class CategorieFixtures extends Fixture
{
    private $counter = 1;

    public function __construct(private SluggerInterface $sluggerInterface){

    }
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $parent = $this->creerCategorie('Sweats', $faker->text(), null, $manager);

        $this->creerCategorie('Sweat à capuche', $faker->text(), $parent, $manager);
        $this->creerCategorie('Sweat sans capuche', $faker->text(), $parent, $manager);

        $parent = $this->creerCategorie('Pull', $faker->text(),null, $manager);

        $this->creerCategorie('Pull sans manches', $faker->text(), $parent, $manager);
        $this->creerCategorie('Pull manches courtes', $faker->text(), $parent, $manager);
        $this->creerCategorie('Pull manches longues', $faker->text(), $parent, $manager);

        $categorie = $this->creerCategorie('Sweat Plaide', $faker->text(), null, $manager);

        $this->creerCategorie('Homme',$faker->text(), $parent, $manager);
        $this->creerCategorie('Femme',$faker->text(), $parent, $manager);
        $this->creerCategorie('Enfant',$faker->text(), $parent, $manager);
        
        $manager->flush();
    }

    public function creerCategorie(string $nom, string $description, Categorie $parent = null, ObjectManager $manager)
    {
        
        $categorie = new Categorie();
        $categorie->setNom($nom);
        $categorie->setDescription($description);
        $categorie->setParent($parent);
        $categorie->setSlug($this->sluggerInterface->slug($categorie->getNom())->lower());
        $manager->persist($categorie);
        
        $this->addReference('cat-'.$this->counter, $categorie);
        $this->counter++;

        return $categorie;
    }
}
