<?php

namespace App\DataFixtures;

use App\Entity\Profils;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProfilsFixtures extends Fixture
{
 
    public const ADMIN_USER="ADMIN";
    public const FORMATEUR_USER="FORMATEUR";
    public const APPRENANT_USER="APPRENANT";
    public const CM_USER="CM";
    public function load(ObjectManager $manager)
    {
        $profils =["ADMIN" ,"FORMATEUR" ,"APPRENANT" ,"CM"];

        for($i=0; $i<4; $i++)
        {
            $newprofils =new Profils() ; 
            $newprofils ->setLibelle($profils[$i]);
            if($profils[$i]==="ADMIN"){

                $this->setReference(self::ADMIN_USER,$newprofils);
            }
            if($profils[$i]==="FORMATEUR"){

                $this->setReference(self::FORMATEUR_USER,$newprofils);
            }
            if($profils[$i]==="APPRENANT"){

                $this->setReference(self::APPRENANT_USER,$newprofils);
            }
            if($profils[$i]==="CM"){

                $this->setReference(self::CM_USER,$newprofils);
            }
    

            $manager ->persist ($newprofils);
           
            $manager->flush();
        }
    }
}
