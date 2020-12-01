<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Profils;
use App\Entity\Apprenants;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ApprenantsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $fake=Factory::create('fr-FR');
        for ($i=1; $i <=10 ; $i++)
        {
            $apprenants= new Apprenants;
            $apprenants ->setUser($UserApprenant)
                        ->setAdresse($fake->address ())
                        ->setStatut($fake->Statut)
                        ->setNiveau($fake->niveau);
                        $manager ->persist ($apprenants);
                        
        }

        $manager->flush();
    }
}