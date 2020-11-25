<?php

namespace App\DataFixtures;

use App\Entity\Profils;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProfilsFixtures extends Fixture
{
    public static function getReferenced($i)
    {
        return sprintf('profils_user_%s' ,$i);
    }
    public function load(ObjectManager $manager)
    {
        $profils =["ADMIN" ,"FORMATEUR" ,"APPRENANT" ,"CM"];

        for($i=0; $i<4; $i++)
        {
            $newprofils =new Profils() ; 
            $newprofils ->setLibelle($profils[$i]);
            $manager ->persist ($newprofils);
            $this ->addReference(self::getReferenced($i),$newprofils);
            $manager->flush();
        }
    }
}
