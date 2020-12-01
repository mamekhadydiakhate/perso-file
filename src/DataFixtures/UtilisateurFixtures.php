<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\UtilisateurFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UtilisateurFixtures extends Fixture
{
    private $encode;
    public function __construct(UserPasswordEncoderInterface $encode)
    {
        $this->encode=$encode;
    }
    public function load(ObjectManager $manager)
    {
        $fake=Factory::create('fr-FR');
        for($i=1 ;$i<=10 ;$i++)
        {
         

        }


       
    }
}

