<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixters extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //  creat Admin User
        $admin = new User();

        $admin->setFirstName("Admin");
        $admin->setLastName("this is Admin");
        $admin->setUserEmail("admin@email.com");
        $admin->setUserLogin("admin");
        $admin->setUserPassword("admin@pass");
        $admin->setPhone("0617239400");
        $admin->setUserImagePath("https://bootdey.com/img/Content/avatar/avatar1.png");

        //  Add role 
        $admin->addUsersRole($this->getReference('Admin'));
        $admin->addUsersRole($this->getReference('User'));
        
        $manager->persist($admin);

        //  creat Normale User
        $user = new User();

        $user->setFirstName("User");
        $user->setLastName("this is User");
        $user->setUserEmail("User@email.com");
        $user->setUserLogin("user");
        $user->setUserPassword("user@pass");
        $user->setPhone("0617239452");
        $user->setUserImagePath("https://bootdey.com/img/Content/avatar/avatar2.png");

        //  Add role 
        $user->addUsersRole($this->getReference('User'));
        
        $manager->persist($user);


        //  ###  
        $manager->flush();

        
    }
}
