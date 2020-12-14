<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Profils;
use App\Entity\Apprenants;
use App\DataFixtures\ProfilsFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApprenantsFixtures extends Fixture  implements DependentFixtureInterface
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
        
            $apprenants= new Apprenants();
           
            $apprenants ->setProfils($this->getReference(ProfilsFixtures::APPRENANT_USER))
                        ->setPrenom ($fake->lastname)
                        ->setTelephone($fake ->phoneNumber())
                        ->setEmail ($fake->email)
                        ->setPhoto ($fake->imageUrl())
                        ->setAdresse ($fake->address())   
                        ->setStatut($fake->randomElement(['actif','attente']))   
                        ->setNom($fake->firstname);

                        $password = $this->encode->encodePassword ($apprenants, '1234' );
                        $apprenants->setPassword ($password );
                        $manager ->persist ($apprenants);
                        
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