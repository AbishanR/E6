<?php

namespace App\DataFixtures;

use App\Entity\User;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $userPassword;
    public function __construct(UserPasswordHasherInterface $userPasswordHasher){
            $this->userPassword=$userPasswordHasher;
    }
        public function load(ObjectManager $manager): void
        {
            $faker=Factory::create("fr_FR");

            $genres=["male","female"];
            for ($i=0; $i < 20; $i++) { 
                $sexe=mt_rand(0,1);
                if ($sexe==0){
                    $type="men";
            }else {
                $type="women";
            }      
                $user= new User();
                $user       ->setNom($faker->lastName())    
                            ->setPrenom($faker->firstName($genres[$sexe]))
                            ->setEmail($faker->email())
                            ->setSexe($sexe)
                            ->setIsVerified(true)
                            ->setAvatar("https://randomuser.me/api/portraits/". $type. "/". $i.".jpg")
                            ->setPassword($this->userPassword->hashPassword(
                                $user,
                                "test1234"
                            ));
                $manager->persist($user);
            }   
        $admin= new User();
                $admin->setNom("Admin")
                            ->setPrenom("Florian")      
                            ->setEmail("admin@gmail.com")
                            ->setSexe(0)
                            ->setIsVerified(true)
                            ->setroles(['ROLE_ADMIN'])
                            ->setAvatar("https://randomuser.me/api/portraits/men/36.jpg")
                            ->setPassword($this->userPassword->hashPassword(
                                $admin,
                                "admintest"
                            ))
                            ;
                $manager->persist($admin);  
        $manager->flush();
    }

}

