<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;

class UsersFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwdEncoder, private SluggerInterface $sluggreInterface){

    }
    public function load(ObjectManager $manager): void
    {
        $admin = new User();
        $admin->setNom('Dupont');
        $admin->setPrenom('Dupont');
        $admin->setEmail('d@gmail.com');
        $admin->setTel('0102030405');
        $admin->setPassword(
            $this->passwdEncoder->hashPassword($admin, '123456')
        );
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $faker = Faker\Factory::create('fr_FR');

        for($usr = 1; $usr <= 3 ; $usr++ ){
            $user = new User();
            $user->setNom($faker->lastName);
            $user->setPrenom($faker->firstName);
            $user->setEmail($faker->email);
            $user->setTel($faker->phoneNumber);
            $user->setPassword(
                $this->passwdEncoder->hashPassword($user, 'azerty')
            );
            $manager->persist($user);
            }

        $manager->flush();
    }
}
