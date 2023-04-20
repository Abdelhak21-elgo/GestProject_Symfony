<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Creat User Role
        $roleUser = new Role();

        $roleUser->setRoleName('user');
        $roleUser->setRoleDescription('this is normale User role');
        
        $manager->persist($roleUser);

        // Creat User Role
        $roleAdmin = new Role();

        $roleAdmin->setRoleName('Admin');
        $roleAdmin->setRoleDescription('this is Admin role');
        
        $manager->persist($roleAdmin);


        //  ###  
        $manager->flush();

        //  ##  Add relation between Users And Roles

        $this->addReference('Admin',$roleAdmin);
        $this->addReference('User',$roleUser);
    }
}
