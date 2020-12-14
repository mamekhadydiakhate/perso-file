<?php

namespace App\DataFixtures;

use App\Entity\Formateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker\Factory;

class FormateurFixtures extends Fixture implements DependentFixtureInterface
{
    private $encode;
    public function __construct(UserPasswordEncoderInterface $encode)
    {
        $this->encode=$encode;
    }
    public function load(ObjectManager $manager)
    {
        $fake=Factory::create('fr-FR');
        for ($i=1; $i <=10 ; $i++)
        {
           
            $formateur= new Formateur;
            $formateur  ->setProfils($this->getReference(ProfilsFixtures::FORMATEUR_USER))
                        ->setPrenom ($fake->lastname)
                        ->setNom($fake->firstname)
                        ->setTelephone($fake ->phoneNumber())
                        ->setEmail ($fake->email)
                        ->setPhoto ($fake->imageUrl());
                        $password = $this->encode->encodePassword ($formateur, '1234' );
                        $formateur->setPassword ($password );
            
            $manager ->persist ($formateur);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ProfilsFixtures::class,
        );
    }
}
