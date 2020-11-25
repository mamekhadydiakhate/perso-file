<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Profils;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Validator\Constraints\Email;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture implements DependentFixtureInterface
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
            $profilsuser=$this ->GetReference(ProfilsFixtures::getReferenced($i %4));

            $email=new Email();
            $user = new User();
            $user ->setProfils($profilsuser);
            $user ->setEmail ($fake->email);
            //Génération des Users
            $password = $this->encode->encodePassword ($user, 'pass_1234' );
            $user ->setPassword ($password );
            $manager ->persist ($user);
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
